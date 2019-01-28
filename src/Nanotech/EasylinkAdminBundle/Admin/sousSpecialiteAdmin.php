<?php

namespace Nanotech\EasylinkAdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class sousSpecialiteAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('nom')
            ->add('tarif')
            ->add('deCourte')
            ->add('deLongue')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('nom')
            ->add('tarif')
            ->add('deCourte')
            ->add('deLongue')
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
            ->add('nom')
            ->add('tarif')
            ->add('deCourte')
            ->add('deLongue')
            ->add('photo', 'sonata_media_type', array(
                        'provider' => 'sonata.media.provider.image',
                        'context' => 'photo',
                        'required' => true,
                        'label' => "image",
                    ))
             ->add('specialite')
            
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('nom')
            ->add('tarif')
            ->add('deCourte')
            ->add('deLongue')
        ;
    }
}
