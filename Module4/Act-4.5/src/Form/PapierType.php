<?php

namespace App\Form;

use App\Classe\Papier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\LessThan;

class PapierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'required' => true
            ])
            ->add('prenom', TextType::class, [
                'required' => true
            ])
            ->add('age',NumberType::class, [
                'required' => false,
                'constraints'=> [new LessThan([
                    'value' => 100]),
                    new GreaterThan([
                        'value' => 1
                    ])
                    ]
            ])
            ->add('adresse',TextareaType::class, [
                'required' => true,
                'constraints' => new Length([
                    'max' => 255
                ])
            ])
            ->add('codePostal',NumberType::class, [
                'required' => true,
                'constraints' => [new LessThan([
                    'value' => 100000,
                    'message' => 'Le code postal doit être une valeur de 5 chiffres'
                ]),
                new GreaterThan([
                    'value' => 9999,
                    'message' => 'Le code postal doit être une valeur de 5 chiffres'
                ])]
            ])
            ->add('ville',ChoiceType::class, [
                'required' => true,
                'choices' => [
                    'Tunis' => false,
                    'Bizerte' => false,
                    'Manouba' => false
                ]
            ] )
            ->add('permis',ChoiceType::class, [
                'choices' => [
                    'AM' => false,
                    'A1' => false,
                    'A2' => false,
                    'A' => false,
                    'B1' => false,
                    'B' => false
                ],
                'expanded' => true,
                'multiple' => true
            ])
            ->add('soumettre',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Papier::class,
        ]);
    }
}

