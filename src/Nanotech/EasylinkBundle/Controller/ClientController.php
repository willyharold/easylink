<?php

namespace Nanotech\EasylinkBundle\Controller;

use Nanotech\EasylinkBundle\Entity\Avis;
use Nanotech\EasylinkBundle\Entity\Offre;
use Nanotech\EasylinkBundle\Form\AvisType;
use Nanotech\EasylinkBundle\Form\ClientType;
use Nanotech\EasylinkBundle\Form\ImageclientType;
use Nanotech\MediaBundle\Entity\Media;
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

                $em->persist($offre);
                $em->flush();
                $session = new Session();
                $session->getFlashBag()->add('annonce',"Enregistrement de l'annonce reussi");
                return $this->redirectToRoute('nanotech_easylink_client_annonce');
            }
        }
        return $this->render('NanotechEasylinkBundle:client:new_annonce.html.twig',['form'=>$form->createView(),'categories'=>$categories]);
    }

    public function edit_annonceAction(Request $request,$id = 0){
        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository('NanotechEasylinkBundle:Offre')->findOneById($id);
        $form = $this->createForm("Nanotech\EasylinkBundle\Form\OffreType",$offre);
        $categories = $em->getRepository('NanotechEasylinkBundle:Specialite')->findAll();

        if($request->getMethod() == "POST"){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $em->merge($offre);
                $em->flush();
                $session = new Session();
                $session->getFlashBag()->add('annonce',"Modification de l'annonce reussi");
                return $this->redirectToRoute('nanotech_easylink_client_annonce');
            }
        }
        return $this->render('NanotechEasylinkBundle:client:new_annonce.html.twig',['form'=>$form->createView(),'categories'=>$categories]);
    }

    public function edit_informationAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $form = $this->createForm(ClientType::class,$user);
        if($request->getMethod() == "POST"){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){

                $em->merge($user);
                $em->flush();
                $session = new Session();
                $session->getFlashBag()->add('information',"Modification des informations reussi");
                return $this->redirectToRoute('nanotech_easylink_client_information');
            }
        }
        return $this->render('NanotechEasylinkBundle:client:edit_information.html.twig',['form'=>$form->createView()]);
    }

    public function dell_annonceAction(Request $request,$id = 0){
        $em = $this->getDoctrine()->getManager();
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

    public function dell_avisAction(Request $request,$id = 0){
        $em = $this->getDoctrine()->getManager();
        $avis = $em->getRepository('NanotechEasylinkBundle:Avis')->findOneById($id);
        $form = $this->createForm(FormType::class,$avis);
        if($request->getMethod() == "POST"){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){

                $offre = $avis->getOffre();
                $offre->setAvis();
                $em->merge($offre);
                $em->flush();
                $em->remove($avis);
                $em->flush();
                $session = new Session();
                $session->getFlashBag()->add('avis',"Suppression de l'avis reussi");
                return $this->redirectToRoute('nanotech_easylink_client_avis');
            }
        }
        return $this->render('NanotechEasylinkBundle:client:dell_avis.html.twig',['form'=>$form->createView()]);
    }

    public function view_annonceAction(Request $request,$id = 0){
        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository('NanotechEasylinkBundle:Offre')->findOneById($id);
        $affectation = $em->getRepository('NanotechEasylinkBundle:Affectation')->findOneByOffre($offre);
        return $this->render('NanotechEasylinkBundle:client:view_annonce.html.twig',['offre'=>$offre,'affectation'=>$affectation]);
    }

    public function view_avisAction(Request $request,$id = 0){
        $em = $this->getDoctrine()->getManager();
        $avis = $em->getRepository('NanotechEasylinkBundle:Avis')->findOneById($id);
        return $this->render('NanotechEasylinkBundle:client:view_avis.html.twig',['avis'=>$avis]);
    }

    public function estimationAction(){
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NanotechEasylinkBundle:Specialite')->findAll();
        //dump($categories);
        $session = new Session();
        $session->remove("offre");

        return $this->render('NanotechEasylinkBundle:client:estimation.html.twig');
    }

    public function avisAction(){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $avis = $em->getRepository('NanotechEasylinkBundle:Avis')->findByClient($user);
        return $this->render('NanotechEasylinkBundle:client:avis.html.twig',["avis"=>$avis]);
    }

    public function new_avisAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $avis = new Avis();
        $form = $this->createForm(AvisType::class,$avis,array('user' => $this->getUser()));
        if($request->getMethod() == "POST"){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $avis->setClient($user);
                $offre = $avis->getOffre();

                $session = new Session();
                $session->getFlashBag()->add('avis',"enregistrement de l'avis reussi");
                $em->persist($avis);
                $em->flush();
                $offre->setAvis($avis);
                $em->merge($avis);
                $em->flush();
                return $this->redirectToRoute('nanotech_easylink_client_avis');
            }
        }
        return $this->render('NanotechEasylinkBundle:client:new_avis.html.twig',["form"=>$form->createView()]);
    }

    public function edit_avisAction(Request $request,$id = 0){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $avis = $em->getRepository('NanotechEasylinkBundle:Avis')->findOneById($id);
        $avis2 = $avis;
        dump($avis2);
        $offre2 = $avis2->getOffre();
        $form = $this->createForm(AvisType::class,$avis,array('user' => $this->getUser()));
        if($request->getMethod() == "POST"){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $offre = $avis->getOffre();
                $em->merge($avis);

                dump($offre2);
                $offre2->setAvis();
                $em->merge($offre2);
                $em->flush();

                $offre->setAvis($avis);
                $em->merge($offre);
                $em->flush();

                $session = new Session();
                $session->getFlashBag()->add('avis',"modification de l'avis reussi");
                return $this->redirectToRoute('nanotech_easylink_client_avis');
            }
        }
        return $this->render('NanotechEasylinkBundle:client:edit_avis.html.twig',["form"=>$form->createView()]);
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
        $avis = $em->getRepository('NanotechEasylinkBundle:Avis')->findByClient($user);
        return new Response(count($avis));
    }

    public function informationAction(Request $request){
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(FormType::class,$user);
        if($request->getMethod() == "POST"){
            //$img = $request->request->get("form-image");
            //dump($_FILES['image']);
            $img = $_FILES['image']['tmp_name'];
            $media_sizes = getimagesize($img);
            $mediaManager = $this->get("sonata.media.manager.media");
            $media = new Media();

            $media->setBinaryContent($img);
            $media->setContext('default');
            $media->setProviderName('sonata.media.provider.image');
            $media->setSize($_FILES['image']['size']);
            $media->setWidth($media_sizes[0]);
            $media->setHeight($media_sizes[1]);

          //  dump($media);

            $mediaManager->save($media);

            $user->setAvatar($media);
            $em->merge($user);
            $em->flush();

            $session = new Session();
            $session->getFlashBag()->add('information',"Modification des informations reussi");

            return $this->redirectToRoute('nanotech_easylink_client_information');

        }
        return $this->render('NanotechEasylinkBundle:client:information.html.twig',["user"=>$user,"form"=>$form->createView()]);
    }

    public function editPasswordAction(Request $request){
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(FormType::class,$user);
        if($request->getMethod() == "POST"){
            $ancienpassword = $request->request->get("oldpassword");
            $nouveaupassword = $request->request->get("newpassword");
            $nouveau2password = $request->request->get("newpassword1");
            if($nouveaupassword != $nouveau2password){
                $session = new Session();
                $session->getFlashBag()->add('error',"Mot de passe different");
                return $this->render('NanotechEasylinkBundle:client:edit_password.html.twig',["form"=>$form->createView(),"error1"=> true ]);
            }

            $encoder_service = $this->get('security.encoder_factory');
            $encoder = $encoder_service->getEncoder($user);

            if($encoder ->isPasswordValid($user->getPassword(),$ancienpassword,$user->getSalt())){
                $user->setplainPassword($nouveaupassword);
                $em->merge($user);
                $em->flush();
                $session = new Session();
                $session->getFlashBag()->add('information',"Modification du mot de passe reussi");
                return $this->redirectToRoute('nanotech_easylink_client_information');
            }
            else{
                $session = new Session();
                $session->getFlashBag()->add('error',"Ancien mot de passe refusé");
                return $this->render('NanotechEasylinkBundle:client:edit_password.html.twig',["form"=>$form->createView(),"error" => true]);

            }

        }
        return $this->render('NanotechEasylinkBundle:client:edit_password.html.twig',["form"=>$form->createView()]);
    }
}
