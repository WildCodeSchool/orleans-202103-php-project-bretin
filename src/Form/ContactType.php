<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civility', ChoiceType::class, [
                'choices' => ['Madame' => 'Mme', 'Mademoiselle' => 'Mlle', 'Monsieur' => 'M.',],
                'label' => 'Civilité',
                'attr' => ['class' => 'mb-3',],
                'placeholder' => 'Choisissez votre civilité',
            ])
            ->add('lastname', TextType::class, [
                'attr' => ['class' => 'mb-3',],
                'label' => 'Nom',
            ])
            ->add('firstname', TextType::class, [
                'attr' => ['class' => 'mb-3',],
                'label' => 'Prénom',
            ])
            ->add('mail', EmailType::class, [
                'attr' => ['class' => 'mb-3',],
                'label' => 'E-mail',
            ])
            ->add('businessName', TextType::class, [
                'attr' => ['class' => 'mb-3',],
                'label' => 'Nom de l\'entreprise',
            ])
            ->add('job', TextType::class, [
                'attr' => ['class' => 'mb-3',],
                'label' => 'Fonction',
            ])
            ->add('situation', TextareaType::class, [
                'attr' => ['class' => 'mb-3',],
                'label' => 'Quelle est la situation rencontrée ?',
            ])
            ->add('need', TextareaType::class, [
                'attr' => ['class' => 'mb-3',],
                'label' => 'Quel serait votre besoin ?',
            ])
            ->add('urgent', ChoiceType::class, [
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                ],
                'attr' => ['class' => 'mb-3',],
                'placeholder' => 'Choisissez votre réponse',
                'label' => 'L’intervention est-elle urgente ?',
            ])
            ->add('urgentResponse', TextareaType::class, [
                'required' => false,
                'empty_data' => 'Non renseigné',
                'attr' => ['class' => 'mb-3',],
                'label' => 'Si oui, pourquoi ?',
            ])
            ->add('intervention', TextareaType::class, [
                'attr' => ['class' => 'mb-3',],
                'label' => 'Avez-vous déjà fait intervenir un psychologue du travail dans votre entreprise et
                si oui à quelle occasion ?',
            ])
            ->add('constraint', TextareaType::class, [
                'attr' => ['class' => 'mb-3',],
                'label' => 'Quelles sont vos contraintes(organisation du travail,
                budget, temps, environnement, etc...) ?',
            ])
            ->add('availability', TextareaType::class, [
                'attr' => ['class' => 'mb-3',],
                'label' => 'Quelles sont vos disponibilités pour se rencontrer ou échanger sur votre besoin ?',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
