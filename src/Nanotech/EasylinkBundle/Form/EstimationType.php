<?php

namespace Nanotech\EasylinkBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EstimationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('typeBien',ChoiceType::class,["choices"=>["appartement"=>"Appartement"],"label"=>"Selectionner votre bien."])
            ->add('debuttravaux',ChoiceType::class,["choices"=>["immediatement"=>"Immediatement"],"label"=> "Quand voudriez -vous commencer les travaux ?"])
            ->add('titre',ChoiceType::class,["choices"=>["installation"=>"Installation"],"label"=>" De quoi s'agit-il ?"])
            ->add('specialite',null,["label"=>"Selectionnez le type de travaux à réaliser ?"])
            ->add('adresse',TextType::class,["attr"=>["placeholder"=>"Adresse"],"label"=>"Donnez-nous l'adresse des travaux."])
            ->add('codePostale',null,["attr"=>["placeholder"=>"Code Postal"]]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nanotech\EasylinkBundle\Entity\Estimation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'nanotech_easylinkbundle_estimation';
    }


}
