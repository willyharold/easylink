<?php

namespace Nanotech\EasylinkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class ClientController extends Controller
{


    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('NanotechEasylinkBundle:Specialite')->findAll();
        //dump($categories);
        $session = new Session();
        $session->remove("offre");

        return $this->render('NanotechEasylinkBundle:client:index.html.twig');
    }

}
