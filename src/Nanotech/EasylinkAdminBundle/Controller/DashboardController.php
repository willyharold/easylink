<?php

namespace Nanotech\EasylinkAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    //tu ecris les fonctions qui permettent de compter et tu utilise response. puis tu vas dans ressource core et tu vois commment j'appelle le controlleur si
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('NanotechEasylinkBundle:Abonnement')->findAll();
        if (empty($entity)) {
            return new Response(0);
        }

        return new Response(count($entity));
    }
    
     public function index1Action()
    {

        $em = $this->getDoctrine()->getManager();
        $partenaire = $em->getRepository('NanotechEasylinkBundle:Affectation')->findAll();
        if (empty($partenaire)) {
            return new Response(0);
        }

        return new Response(count($partenaire));
    }
    
    public function index2Action()
    {

        $em = $this->getDoctrine()->getManager();
        $cartebar = $em->getRepository('NanotechEasylinkBundle:Avis')->findAll();
        if (empty($cartebar)) {
            return new Response(0);
        }

        return new Response(count($cartebar));
    }
    
     public function index3Action()
    {

        $em = $this->getDoctrine()->getManager();
         $carterestaurant = $em->getRepository('NanotechEasylinkBundle:Message')->findAll();
        if (empty($carterestaurant)) {
            return new Response(0);
        }

        return new Response(count($carterestaurant));
    }
    
     public function index4Action()
    {

        $em = $this->getDoctrine()->getManager();
       $piece = $em->getRepository('NanotechEasylinkBundle:Newletter')->findAll();
        if (empty($piece)) {
            return new Response(0);
        }

        return new Response(count($piece));
    }
    
       public function index5Action()
    {

        $em = $this->getDoctrine()->getManager();
     $planning = $em->getRepository('NanotechEasylinkBundle:Offre')->findAll();
        if (empty($planning)) {
            return new Response(0);
        }

        return new Response(count($planning));
    }
    
      public function index6Action()
    {

        $em = $this->getDoctrine()->getManager();
      $commandebar = $em->getRepository('NanotechEasylinkBundle:Specialite')->findAll();
        if (empty($commandebar)) {
            return new Response(0);
        }

        return new Response(count($commandebar));
    }
    
     public function index7Action()
    {

        $em = $this->getDoctrine()->getManager();
      $commanderestaurant = $em->getRepository('NanotechEasylinkBundle:sousSpecialite')->findAll();
        if (empty($commanderestaurant)) {
            return new Response(0);
        }

        return new Response(count($commanderestaurant));
    }
    
    
    
      
}
