<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civility', ChoiceType::class, [
                'choices' => [
                    'Madame' => 'Mme',
                    'Mademoiselle' => 'Mlle',
                    'Monsieur' => 'M.',
                ],
            ])
            ->add('lastname')
            ->add('firstname')
            ->add('mail')
            ->add('businessName')
            ->add('job')
            ->add('situation', TextareaType::class)
            ->add('need', TextareaType::class)
            ->add('urgent', ChoiceType::class, [
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                ],
            ])
            ->add('urgentResponse', TextareaType::class, ['required' => false, 'empty_data' => 'Non renseigné',])
            ->add('intervention', TextareaType::class)
            ->add('constraint', TextareaType::class)
            ->add('availability', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
