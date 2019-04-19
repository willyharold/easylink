<?php

namespace Nanotech\EasylinkBundle\Form;

use Nanotech\EasylinkBundle\Entity\Offre;
use Nanotech\EasylinkBundle\Repository\OffreRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvisType extends AbstractType
{
    protected $user;

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->user = $options['user'];
        $builder->add('offre',EntityType::class,[
            "class"=>Offre::class,
            "query_builder"=> function(OffreRepository $repository) {return $repository->findByUserAnnonce($this->user);},
            "attr"=>["placeholder"=>"Offre"]
            ])
            ->add('amelioration',null,["attr"=>["placeholder"=>"Suggestion"]])
            ->add('note',ChoiceType::class,["attr"=>["placeholder"=>"Note"], 'choices' => [
                1 => "note 1 / 5",
                2 => "note 2 / 5",
                3 => "note 3 / 5",
                4 => "note 4 / 5",
                5 => "note 5 / 5",
            ],]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nanotech\EasylinkBundle\Entity\Avis',
            'user'=> null,
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'nanotech_easylinkbundle_avis';
    }

}
