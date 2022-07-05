<?php

namespace App\Form;

use App\Classe\AdresseEmail;
use App\Validator\LebonCoin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;

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
        ->add('affaireLeboncoin', TextType::class, [
            'constraints'=>new LebonCoin([])
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