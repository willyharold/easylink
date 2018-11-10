<?php

namespace Nanotech\EasylinkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NanotechEasylinkBundle:Default:index.html.twig');
    }
}
