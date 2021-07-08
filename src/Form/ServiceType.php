<?php

namespace App\Form;

use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', null, array( 'attr' => array(
            'placeholder' => 'Relaxation',
        )))
        ->add('price', null, array( 'attr' => array(
            'placeholder' => '50',
        )))
        ->add('price2', null, array( 'attr' => array(
            'placeholder' => '0',
        )));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
        ]);
    }
}
