<?php

namespace Nanotech\EasylinkBundle\Controller;

use Nanotech\EasylinkBundle\Entity\Offre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class ClientController extends Controller
{


    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NanotechEasylinkBundle:Specialite')->findAll();
        //dump($categories);
        $session = new Session();
        $session->remove("offre");

        return $this->render('NanotechEasylinkBundle:client:dashboard.html.twig');
    }

    public function annonceAction(){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $annonces = $em->getRepository('NanotechEasylinkBundle:Offre')->findByClient($user);
        return $this->render('NanotechEasylinkBundle:client:annonce.html.twig',["annonces"=>$annonces]);
    }

    public function new_annonceAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $offre = new Offre();
        $form = $this->createForm("Nanotech\EasylinkBundle\Form\OffreType",$offre);
        $categories = $em->getRepository('NanotechEasylinkBundle:Specialite')->findAll();

        if($request->getMethod() == "POST"){
            //dump($offre);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
              //  dump($offre);
                $offre->setClient($user);
                $offre->setEtat("En attente");
                $session = new Session();
                $session->getFlashBag()->add('annonce',"Enregistrement de l'annonce reussi");
                $em->persist($offre);
                $em->flush();
                return $this->redirectToRoute('nanotech_easylink_client_annonce');
            }
        }
        return $this->render('NanotechEasylinkBundle:client:new_annonce.html.twig',['form'=>$form->createView(),'categories'=>$categories]);
    }

    public function edit_annonceAction(Request $request,$id = 0){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $offre = $em->getRepository('NanotechEasylinkBundle:Offre')->findOneById($id);
        $form = $this->createForm("Nanotech\EasylinkBundle\Form\OffreType",$offre);
        $categories = $em->getRepository('NanotechEasylinkBundle:Specialite')->findAll();

        if($request->getMethod() == "POST"){
          //  dump($offre);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
            //    dump($offre);
                //$offre->setClient($user);
               // $offre->setEtat("En attente");
                $session = new Session();
                $session->getFlashBag()->add('annonce',"Modification de l'annonce reussi");
                $em->merge($offre);
                $em->flush();
                return $this->redirectToRoute('nanotech_easylink_client_annonce');
            }
        }
        return $this->render('NanotechEasylinkBundle:client:new_annonce.html.twig',['form'=>$form->createView(),'categories'=>$categories]);
    }

    public function dell_annonceAction(Request $request,$id = 0){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $offre = $em->getRepository('NanotechEasylinkBundle:Offre')->findOneById($id);
        $form = $this->createForm(FormType::class,$offre);
        if($request->getMethod() == "POST"){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){

                $session = new Session();
                $session->getFlashBag()->add('annonce',"Suppression de l'annonce reussi");
                $em->remove($offre);
                $em->flush();
                return $this->redirectToRoute('nanotech_easylink_client_annonce');
            }
        }
        return $this->render('NanotechEasylinkBundle:client:dell_annonce.html.twig',['form'=>$form->createView()]);
    }

    public function view_annonceAction(Request $request,$id = 0){
        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository('NanotechEasylinkBundle:Offre')->findOneById($id);
        $affectation = $em->getRepository('NanotechEasylinkBundle:Affectation')->findOneByOffre($offre);
        return $this->render('NanotechEasylinkBundle:client:view_annonce.html.twig',['offre'=>$offre,'affectation'=>$affectation]);
    }

    public function estimationAction(){
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NanotechEasylinkBundle:Specialite')->findAll();
        //dump($categories);
        $session = new Session();
        $session->remove("offre");

        return $this->render('NanotechEasylinkBundle:client:estimation.html.twig');
    }

    public function devisAction(){
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NanotechEasylinkBundle:Specialite')->findAll();
        //dump($categories);
        $session = new Session();
        $session->remove("offre");

        return $this->render('NanotechEasylinkBundle:client:devis.html.twig');
    }

    public function nbrannonceAction(){
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository('NanotechEasylinkBundle:Offre')->findByClient($user);
        return new Response(count($annonce));
    }

    public function nbravisAction(){
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository('NanotechEasylinkBundle:Avis')->find($user);
        return new Response(count($annonce));
    }
}
