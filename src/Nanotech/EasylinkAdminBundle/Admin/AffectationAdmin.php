<?php

namespace Nanotech\EasylinkAdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class AffectationAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('artisan1')
            ->add('artisan2')
            ->add('artisan3')
            ->add('dateEn')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('offre')
            ->add('estimation')
            ->add('artisan1')
            ->add('artisan2')
            ->add('artisan3')
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
            ->add('artisan1')
            ->add('artisan2')
            ->add('artisan3')
            ->add('offre')
            ->add('estimation')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('artisan1')
            ->add('artisan2')
            ->add('artisan3')
            ->add('offre')
            ->add('estimation')
            ->add('dateEn')
        ;
    }
}
