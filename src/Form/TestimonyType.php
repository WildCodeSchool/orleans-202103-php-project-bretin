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
            ->add('name', null, ['attr' => [
                'placeholder' => 'John Doe'
            ]])
            ->add('age', null, ['attr' => [
                'placeholder' => '35',
            ]])
            ->add('message', null, ['attr' => [
                'placeholder' => 'Avis',
            ]])
            ->add('date', null, ['attr' => [
                'placeholder' => '10/07/2021',
            ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Testimony::class,
        ]);
    }
}
