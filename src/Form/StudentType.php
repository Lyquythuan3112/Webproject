<?php

namespace App\Form;

use App\Entity\Classes;
use App\Entity\Subject;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
        ->add('Classes', EntityType::class,[
            'Name' => Classes::class,
            'choice_label' => 'Name'
        ])
        ->add('Subject', EntityType::class,[
            'Name' => Subject::class,
            'choice_label' => 'Name'
        ])
        ->add('Name')
        ->add('Sex')
        ->add('Dateofbirth')
        ->add('Phone')
        ->add('save',SubmitType::class,[
            'label' => "Confirm"
        ]);
    }
    public function configureOptions(OptionsResolver $resolved)
    {
        $resolved->setDefaults([
            'data_class' => Classes::class,
        ]);
    }
}