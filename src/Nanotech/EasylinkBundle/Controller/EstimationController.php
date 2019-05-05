<?php

namespace Nanotech\EasylinkBundle\Controller;

use Nanotech\EasylinkBundle\Entity\Contact;
use Nanotech\EasylinkBundle\Entity\Estimation;
use Nanotech\EasylinkBundle\Form\EstimationType;
use Nanotech\EasylinkBundle\Form\FenetreType;
use Nanotech\EasylinkBundle\Repository\EstimationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class EstimationController extends Controller
{
    public function estimationAction(){

        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $estimation = $em->getRepository('NanotechEasylinkBundle:Estimation')->findByClient($user);
        return $this->render('NanotechEasylinkBundle:client/estimation:estimation.html.twig',["estimations"=>$estimation]);
    }

    public  function newestimationAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $estimation = new Estimation();
        $user = $this->getUser();
        $form = $this->createForm(EstimationType::class,$estimation);
        if($request->getMethod() == "POST"){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){

                $estimation->setClient($user);
                $estimation->setEtat("Interrompu");
                $em->persist($estimation);
                $em->flush();

                return $this->redirectToRoute('nanotech_easylink_client_estimation_fenetre_add',["id"=>$estimation->getId()]);
            }

        }

        return $this->render('NanotechEasylinkBundle:client/estimation:new_estimation.html.twig',["form"=> $form->createView()]);
    }

    public  function newfenetreAction(Request $request, $id = 0){
        $em = $this->getDoctrine()->getManager();

        $estimation = $em->getRepository('NanotechEasylinkBundle:Estimation')->findOneById($id);
        $user = $this->getUser();
        $form = $this->createForm(FenetreType::class,$estimation);
        if($request->getMethod() == "POST"){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){

                $estimation->setEtat("En attente");
                $em->merge($estimation);
                $em->flush();
                $session = new Session();
                $session->getFlashBag()->add('estimation',"enregistrement de l'estimation reussi");

                return $this->redirectToRoute('nanotech_easylink_client_estimation');
            }

        }

        return $this->render('NanotechEasylinkBundle:client/estimation:new_fenetre.html.twig',["form"=> $form->createView()]);
    }

    public  function editfenetreAction(Request $request, $id = 0){
        $em = $this->getDoctrine()->getManager();
        $estimation = $em->getRepository('NanotechEasylinkBundle:Estimation')->findOneById($id);
        $user = $this->getUser();
        $form = $this->createForm(EstimationType::class,$estimation);
        if($request->getMethod() == "POST"){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){

                $estimation->setEtat("En attente");
                $em->merge($estimation);
                $em->flush();
                $session = new Session();
                $session->getFlashBag()->add('estimation',"modification de l'estimation reussi");

                return $this->redirectToRoute('nanotech_easylink_client_estimation_fenetre_add',["id"=>$estimation->getId()]);
            }

        }

        return $this->render('NanotechEasylinkBundle:client/estimation:edit_estimation.html.twig',["form"=> $form->createView()]);
    }

    public  function viewestimationAction(Request $request, $id = 0){
        $em = $this->getDoctrine()->getManager();
        $estimation = $em->getRepository('NanotechEasylinkBundle:Estimation')->findOneById($id);
        $affectation = $em->getRepository('NanotechEasylinkBundle:Affectation')->findOneByEstimation($estimation);
        $user = $this->getUser();
        $contact = new Contact();
        $form = $this->createForm(FormType::class,$contact);
        if($request->getMethod() == 'POST'){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){

                $artisan =$em->getRepository('NanotechEasylinkBundle:Utilisateur')->findOneById($request->request->get("artisan"));
                $contact->setClient($user);
                $contact->setEstimation($estimation);
                $contact->setArtisan($artisan);

                $em->merge($contact);
                $em->flush();
                $session = new Session();
                $session->getFlashBag()->add('contact',"l'artisan a été contacté, il vous repondra sous peu");

                return $this->redirectToRoute('nanotech_easylink_client_estimation_view',["id"=>$estimation->getId()]);
            }
        }
        return $this->render('NanotechEasylinkBundle:client/estimation:view_estimation.html.twig',["estimation"=>$estimation,"affectation"=>$affectation,"form"=>$form->createView()]);
    }

    public function dell_estimationAction(Request $request,$id = 0){
        $em = $this->getDoctrine()->getManager();
        $estimation= $em->getRepository('NanotechEasylinkBundle:Estimation')->findOneById($id);
        $form = $this->createForm(FormType::class,$estimation);
        if($request->getMethod() == "POST"){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $em->remove($estimation);
                $em->flush();
                $session = new Session();
                $session->getFlashBag()->add('estimation',"Suppression de l'estimation reussi");
                return $this->redirectToRoute('nanotech_easylink_client_estimation');
            }
        }
        return $this->render('NanotechEasylinkBundle:client/estimation:dell_estimation.html.twig',['form'=>$form->createView()]);
    }
}
