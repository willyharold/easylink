<?php

namespace Nanotech\EasylinkBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FenetreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nbrOuvertureFenetre',ChoiceType::class,["choices"=>["appartement"=>"Appartement"],"label"=>"Selectionner votre bien."])
            ->add('materielFenetre',ChoiceType::class,["choices"=>["pvc"=>"Pvc"],"label"=> "Quel matériel à utiliser ?"])
            ->add('sousSpecialite')
            ->add('description',null,["attr"=>["placeholder"=>"Descrition"],"label"=>"Courte descriptiond des travaux à effectuer."]);

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
