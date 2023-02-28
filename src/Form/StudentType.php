<?php

namespace App\Form;

use App\Entity\Classes;
use App\Entity\Student;
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
        ->add('ClassName', EntityType::class,[
            'class' => Classes::class,
            'choice_label' => 'name'
        ])
        ->add('Subject', EntityType::class,[
            'class' => Subject::class,
            'choice_label' => 'name'
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
            'data_class' => Student::class,
        ]);
    }
}