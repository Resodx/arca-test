<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


class CompanyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Company Name',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a title',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Your title should be at least {{ limit }} characters',
                        'max' => 255,
                    ]),
                ],
            ])
            ->add('phone', TextType::class, [
                'label' => 'Phone Number',
                'attr' => [
                    'data-mask' => '(00) 00000-0000',
                    'maxlength' => 11,
                    'class' => 'form-control'
                ],

                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a phone number',
                    ]),
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Your phone should be at least {{ limit }} characters',
                        'max' => 11,
                        'maxMessage' => 'Your phone shouldn\'t be more than {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('address', TextType::class, [
                'label' => 'Address',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a address',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Your address should be at least {{ limit }} characters',
                        'max' => 255,
                    ]),
                ],
            ])
            ->add('zipcode', TextType::class, [
                'label' => 'Zipcode',
                'attr' => [
                    'data-mask' => '00000-000',
                    'maxlength' => 8,
                    'class' => 'form-control'
                ],

                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a zipcode',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Your zipcode should be at least {{ limit }} characters',
                        'max' => 8,
                        'maxMessage' => 'Your zipcode shouldn\'t be more than {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('city', TextType::class, [
                'label' => 'City',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a city',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Your city should be at least {{ limit }} characters',
                        'max' => 255,
                    ]),
                ],
            ])
            ->add('state', TextType::class, [
                'label' => 'State',
                'attr' => [
                    'style' => "text-transform: uppercase",
                    'maxlength' => 2,
                    'class' => 'form-control'
                ],

                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a state',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Your state should be at least {{ limit }} characters',
                        'max' => 2,
                        'maxMessage' => 'Your state shouldn\'t be more than {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('description')
            // ->add('category')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
