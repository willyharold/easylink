<?php

namespace Nanotech\EasylinkAdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\MediaBundle\Form\Type\MediaType;

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
            ->add('email')
            ->add('enabled')
            ->add('roles')
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('dateNaissance')
            ->add('telephone')
            ->add('ville')
            ->add('codePostale')
            ->add('adresse')
            ->add('specialite')
            ->add('avatar',MediaType::class,['context'=>'default','provider'=>'sonata.media.provider.image'])
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
            ->add('ville')
            ->add('codePostale')
            ->add('adresse')
        ;
    }
}
