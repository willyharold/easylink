<?php

namespace Nanotech\EasylinkBundle\Controller;

use Nanotech\EasylinkBundle\Entity\Offre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class AnnonceController extends Controller
{


    public function annonceAction(){
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NanotechEasylinkBundle:Specialite')->findAll();
        //dump($categories);
        $session = new Session();
        $session->remove("offre");

        return $this->render('NanotechEasylinkBundle:Default:annonce.html.twig',["categories" => $categories]);
    }

    public function sousspecialiteAction($id = 0){
        $em = $this->getDoctrine()->getManager();
        $souspecialites = $em->getRepository('NanotechEasylinkBundle:sousSpecialite')->findBySpecialite($id);

        return $this->render('NanotechEasylinkBundle:Default:annonce-sousspecialite-js.html.twig',["sousspecialites" => $souspecialites]);
    }

    public function postformannonceAction(Request $request){
        $em = $this->getDoctrine()->getManager();

        if($request->getMethod() == "POST"){
            $offre = new Offre();
            $offre->setAdresse($request->request->get("form-adresse"));
            $offre->setCodePostale($request->request->get("form-poste"));
            $offre->setDescription($request->request->get("form-message"));
            $offre->setEtat("En attente");
            $idsousspe = $request->request->get("form-sousspecialite");
            $sousspecialite = $em->getRepository('NanotechEasylinkBundle:sousSpecialite')->findOneById($idsousspe);
            if($sousspecialite){
                $offre->setSousSpecialite($sousspecialite);
                $em->persist($offre);
                $em->flush();
                $session = new Session();
                $session->set("offre",$offre->getId());
                return $this->redirectToRoute('fos_user_registration_register');
            }
        }
        return $this->redirectToRoute('nanotech_easylink_annonce');
    }
}
