<?php

namespace Nanotech\EasylinkAdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class OffreAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
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

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
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
            ->add('photo1', 'sonata_media_type', array(
                        'provider' => 'sonata.media.provider.image',
                        'context' => 'photo',
                        'required' => true,
                        'label' => "photo1",
                    ))
                ->add('photo2', 'sonata_media_type', array(
                        'provider' => 'sonata.media.provider.image',
                        'context' => 'photo',
                        'required' => true,
                        'label' => "photo2",
                    ))
                ->add('photo3', 'sonata_media_type', array(
                        'provider' => 'sonata.media.provider.image',
                        'context' => 'photo',
                        'required' => true,
                        'label' => "photo3",
                    ))
            ->add('note')
            ->add('commentaire')
            ->add('etat')
                  ->add('sous_specialite')
           
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
