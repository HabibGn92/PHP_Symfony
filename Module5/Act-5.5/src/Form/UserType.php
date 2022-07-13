<?php

namespace App\Form;

use App\Entity\Profession;
use App\Entity\User;
use App\Repository\ProfessionRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    private $professionRepo;

    public function __construct(ProfessionRepository $professionRepository){
        $this->professionRepo = $professionRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       
       $professions = $this->professionRepo->findAll();
       $choices = array();
       foreach ($professions as $profession) {
        $choices[$profession->getName()] = $profession->getName();
       }

        $builder
            ->add('_username',TextType::class)
            ->add('_email',TextType::class)
            ->add('profession',ChoiceType::class, [
                'mapped' => false,
                'choices' => $choices
            ])
            ->add('password',PasswordType::class)
            ->add('soumettre',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
