<?php

namespace Nanotech\EasylinkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NanotechEasylinkBundle:Default:index.html.twig');
    }

    public function menuAction(){
        return $this->render('NanotechEasylinkBundle:Default:menu.html.twig');
    }

    public function footerAction(){
        return $this->render('NanotechEasylinkBundle:Default:footer.html.twig');

    }

    public function contactAction(){
        return $this->render('NanotechEasylinkBundle:Default:contact.html.twig');
    }

    public function aboutAction(){
        return $this->render('NanotechEasylinkBundle:Default:about.html.twig');
    }
}
