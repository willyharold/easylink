<?php
/**
 * Created by PhpStorm.
 * User: europeonline
 * Date: 15/03/2019
 * Time: 21:13
 */

namespace Nanotech\EasylinkBundle\Event;



use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Translation\TranslatorInterface;

class RegisterListener
{
    protected $em;
    protected $router;
    protected $translator;


    public function __construct(EntityManager $em, UrlGeneratorInterface $router,  TranslatorInterface $translator)
    {
        $this->em = $em;
        $this->router = $router;
        $this->translator = $translator;
    }

    public function overrideUserAnnonce(FilterUserResponseEvent $args){
        $request = $args->getRequest();
        $formFields = $request->get('fos_user_registration_form');
        // here you can define specific email, ex:
        $email = $formFields['email'];

        //$user = $this->entityManager->getRepository('NanotechEasylinkBundle:Utilisateur')->findOneByUsername($args->getForm()->getData());
        $session = new Session();
        $idoffre = $session->get('offre');
        dump($this->em->getRepository('NanotechEasylinkBundle:Offre')->findAll()) ;
        if($idoffre){
            $offre = $this->em->getRepository('NanotechEasylinkBundle:Offre')->findOneById($idoffre);
            dump($offre);
            $offre->setClient($args->getUser());
            $this->em->merge($offre);
            $this->em->flush();
        }


        $args->setResponse(new RedirectResponse($this->router->generate("nanotech_easylink_homepage")));
    }

    public function redirecttohome(FormEvent $event){

        $session = new Session();
        $user = $event->getForm()->getData();
        $session->getFlashBag()->add('confirmer', $this->translator->trans("registration.check_email", ["%email%"=>$user->getEmail()], 'FOSUserBundle'));
        $event->setResponse(new RedirectResponse($this->router->generate("nanotech_easylink_homepage")));
    }

}