<?php

namespace Nanotech\MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MediaBundle:Default:index.html.twig');
    }
}
