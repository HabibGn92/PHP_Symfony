<?php

namespace App\Form;

use App\Classe\Equipe;
use App\Classe\Joueur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nomEquipe', TextType::class, [
            'required' => true
        ])
        ->add('ville', TextType::class, [
            'required' => true
        ])
        ->add('sport', ChoiceType::class, [
            'required' => true,
            'choices' => [
                'football'=>false,
                'rugby'=>false,
                'handball'=>false,
                'volletball'=>false,
            ],
            'expanded' => 'true'
        ])
        ->add('joueur', JoueurType::class)
        ->add('soumettre', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Equipe::class,
        ]);
    }
}