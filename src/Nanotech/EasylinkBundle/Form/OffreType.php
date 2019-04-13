<?php

namespace Nanotech\EasylinkBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description',null,["attr"=>["placeholder"=>"Description detaillé des travaux requis"]])
            ->add('adresse',TextType::class,["attr"=>["placeholder"=>"Adresse"]])
            ->add('codePostale',null,["attr"=>["placeholder"=>"Code Postal"]])
            ->add('sous_specialite')
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nanotech\EasylinkBundle\Entity\Offre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'nanotech_easylinkbundle_offre';
    }


}
