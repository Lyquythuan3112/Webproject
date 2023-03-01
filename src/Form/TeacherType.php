<?php

namespace App\Form;

use App\Entity\Teacher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeacherType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
        ->add('Name')
        ->add('NameSubject')
        ->add('NameClass')
        ->add('save',SubmitType::class,[
            'label' => "Confirm"
        ]);
    }
    public function configureOptions(OptionsResolver $resolved)
    {
        $resolved->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}