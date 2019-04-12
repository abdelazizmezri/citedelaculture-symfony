<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class reclamationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('evenement',EntityType::class, array(
                'class'=>'AppBundle:Evenement',
                'choice_label'=>'description',
                'multiple'=>false,

            ))
            ->add('priorite', ChoiceType::class , array(
                'choices'  => array(
                    'danger' => 'danger',
                    'warning' => 'warning',
                    'general' => 'general',

                ),
            ))
            ->add('titre')
            ->add('description')




        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Reclamation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'Appbundle_reclamation';
    }


}
