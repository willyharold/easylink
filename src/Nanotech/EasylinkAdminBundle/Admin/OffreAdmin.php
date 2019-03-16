<?php

namespace Nanotech\EasylinkAdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;

class OffreAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('description')
            ->add('adresse')
            ->add('codePostale')
            ->add('etat')
            ->add('dateEn')
            ->add('client')
            ->add('artisan')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('description')
            ->add('adresse')
            ->add('codePostale')
            ->add('etat')
            ->add('client')
            ->add('artisan')
            ->add('dateEn')
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
            ->add('description')
            ->add('adresse')
            ->add('codePostale')
            ->add('etat')
            ->add('client')
            ->add('artisan')
            ->add('imageOffre', CollectionType::class, [],['edit'=>'inline','inline'=>'table','sortable'=>'position','admin_code'=>'nanotech_easylink_admin.admin.image_offre'])
           
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('objet')
            ->add('description')
            ->add('type')
            ->add('deTravaux')
            ->add('adresse')
            ->add('adressecom')
            ->add('ville')
            ->add('codePostale')
            ->add('telephone')
            ->add('paiement')
            ->add('note')
            ->add('commentaire')
            ->add('etat')
            ->add('dateEn')
        ;
    }
}
