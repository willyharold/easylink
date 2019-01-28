<?php

namespace Nanotech\EasylinkAdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UtilisateurAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('usernameCanonical')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('id')
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('dateNaissance')
            ->add('telephone')
            ->add('dateEnreg')
            ->add('abonnement')
            ->add('ville')
            ->add('codePostale')
            ->add('adresse')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('username')
            ->add('usernameCanonical')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('id')
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('dateNaissance')
            ->add('telephone')
            ->add('dateEnreg')
            ->add('abonnement')
            ->add('ville')
            ->add('codePostale')
            ->add('adresse')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username')
            ->add('usernameCanonical')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('id')
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('dateNaissance')
            ->add('telephone')
            ->add('abonnement')
            ->add('ville')
            ->add('codePostale')
            ->add('adresse')
            ->add('specialite')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username')
            ->add('usernameCanonical')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('id')
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('dateNaissance')
            ->add('telephone')
            ->add('dateEnreg')
            ->add('abonnement')
            ->add('ville')
            ->add('codePostale')
            ->add('adresse')
        ;
    }
}