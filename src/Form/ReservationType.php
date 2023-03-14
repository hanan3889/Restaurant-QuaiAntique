<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
        ->add('name', TextType::class,[
            'label' => 'Nom',
            'attr' => [
                'class' => 'form-control',
                'required' => true,
                
            ]
            ])
            ->add('firstname', TextType::class,[
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'form-control',
                    'required' => true,
                ]
                ])
            ->add('email', EmailType::class)
            ->add('arrivalDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'label' => 'Jour d\'arrivée'
            ])
            // ->add('departureDate', DateType::class, [
            //     'widget' => 'single_text',
            //     'format' => 'yyyy-MM-dd',
            //     'label' =>''
            // ])
            // ->add('submit', SubmitType::class, [
            //     'label' => 'valider',
            // ])
            ->add('startTime',TimeType::class,[
                'input' =>'datetime',
                'widget' =>'choice',
                'label' => 'Heure du repas'
            ])
            ->add('numberOfGuests', IntegerType::class, [
                'label' =>'Nombres d\'invités',
            ]);
            
    }
}
