<?php

namespace App\Form;

use App\Entity\Office;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OfficeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, array( 'attr' => array(
                'placeholder' => 'Cabinet Centre-ville',
            )))
            ->add('address', null, array( 'attr' => array(
                'placeholder' => '2, rue de la République',
            )))
            ->add('zipcode', null, array( 'attr' => array(
                'placeholder' => '45000',
            )))
            ->add('city', null, array( 'attr' => array(
                'placeholder' => 'Orléans',
            )))
            ->add('phone', null, array( 'attr' => array(
                'placeholder' => '0656989858',
            )))
            ->add('mail', null, array( 'attr' => array(
                'placeholder' => 'adressemail@gmail.fr',
            )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Office::class,
        ]);
    }
}
