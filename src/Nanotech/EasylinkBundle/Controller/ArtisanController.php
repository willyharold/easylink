<?php

namespace Nanotech\EasylinkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArtisanController extends Controller
{
    public function indexAction()
    {
        return $this->render('NanotechEasylinkBundle:artisan:index.html.twig');
    }

    public function inscriptionAction()
    {
        return $this->render('NanotechEasylinkBundle:artisan:register.html.twig');
    }

    public function dashboardAction()
    {
        return $this->render('NanotechEasylinkBundle:artisan/dashboard:index.html.twig');
    }

    public function menuAction($id=0)
    {
        return $this->render('NanotechEasylinkBundle:artisan:menu.html.twig',["id"=>$id]);
    }
}
