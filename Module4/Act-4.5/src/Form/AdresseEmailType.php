<?php

namespace App\Form;

use App\Classe\AdresseEmail;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;

class AdresseEmailType extends AbstractType
{
 
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('adresseEmail', TextType::class, [
            'constraints' => [
                new Email([
                    'message' => 'entrer une email valid'
                ])
            ]
        ])
        ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AdresseEmail::class,
        ]);
    }
}