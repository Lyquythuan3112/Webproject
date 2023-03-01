<?php

namespace App\Form;

use App\Entity\Campus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
        ->add('Name')
        ->add('save',SubmitType::class,[
            'label' => "Confirm"
        ]);
    }
    public function configureOptions(OptionsResolver $resolved)
    {
        $resolved->setDefaults([
            'data_class' => Campus::class,
        ]);
    }
}