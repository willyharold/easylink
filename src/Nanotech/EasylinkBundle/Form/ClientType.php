<?php

namespace Nanotech\EasylinkBundle\Form;

use Sonata\CoreBundle\Form\Type\DatePickerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',null,["attr"=>["placeholder"=>"Nom"]])
            ->add('prenom',null,["attr"=>["placeholder"=>"Prénom"]])
            ->add('sexe',ChoiceType::class, [
                'choices' => [
                    'masculin' => 'MASCULIN',
                    'feminin' => 'FEMININ',
                ],
            ])
            ->add('dateNaissance',null)
            ->add('adresse',TextType::class,["attr"=>["placeholder"=>"Adresse"]])
            ->add('codePostale',TextType::class,["attr"=>["placeholder"=>"Code postal"]])
            ->add('telephone',null,["attr"=>["placeholder"=>"Téléphone"]]);
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nanotech\EasylinkBundle\Entity\Utilisateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'nanotech_easylinkbundle_utilisateur';
    }


}
