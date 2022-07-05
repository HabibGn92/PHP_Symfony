<?php

namespace App\Form;

use App\Classe\Payment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class PaymentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Montant', MoneyType::class,[
            'required' => true,
            'currency' => 'USD',
            'attr' => [
                "value" => 375
            ]
        ])
        ->add('email', RepeatedType::class, [
            'type' => EmailType::class,
            'required' => true,
            'first_options' => ['label' => 'E-mail', 'attr'=>['placeholder' => "example@site.com"]],
            'second_options' => ['label' => 'Confirmail e-mail']
        ])
        ->add('Numero', TelType::class, [
            'required' => true,
            'constraints' => [new Length([
                'min'=> 10,
                'max'=> 10,
                'exactMessage' => 'Votre numero doit faire 10 chiffres de long'
            ]),
            new Regex([
                'pattern' => '/^0[67]/',
                'message' => 'Le numero doit commencer par 06 ou 07'
            ])]
        ])
        ->add('soumettre', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Payment::class,
        ]);
    }
}