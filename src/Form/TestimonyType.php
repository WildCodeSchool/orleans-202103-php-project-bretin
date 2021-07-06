<?php

namespace App\Form;

use App\Entity\Testimony;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestimonyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, array('attr' => array(
                'placeholder' => 'nom'
            )))
            ->add('age', null, array( 'attr' => array(
                'placeholder' => 'âge',
            )))
            ->add('message', null, array( 'attr' => array(
                'placeholder' => 'message',
            )))
            ->add('date', null, array( 'attr' => array(
                'placeholder' => 'date',
            )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Testimony::class,
        ]);
    }
}
