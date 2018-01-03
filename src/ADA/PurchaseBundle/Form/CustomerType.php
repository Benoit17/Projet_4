<?php

namespace ADA\PurchaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


class CustomerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'attr' => array('placeholder' => 'form.name'),
                'constraints' => array(
                    new NotBlank(array('message' => 'form.empty')),
                    new Length(array(
                        'min' => 2,
                        'minMessage' => "Veuillez saisir un nom valide.")),
                )
            ))
            ->add('firstName', TextType::class, array(
                'attr' => array('placeholder' => 'form.firstName'),
                'constraints' => array(
                    new NotBlank(array('message' => 'form.empty')),
                    new Length(array(
                        'min' => 2,
                        'minMessage' => "Veuillez saisir un prénom valide.")),
                )
            ))
            ->add('country', CountryType::class, array(
                'placeholder' => 'form.country',
                'constraints' => array(
                    new NotBlank(array('message' => 'form.empty')),
                )
            ))
            ->add('birthDate', BirthdayType::class, array(
                'label' => 'form.birthDate',
                'format' => 'dd-MM-y',
                'placeholder' => array('year' => 'form.Year', 'month' => 'form.Month', 'day' => 'form.Day',
                ),
                'constraints' => array(
                    new NotBlank(array('message' => 'form.empty')),
                )
            ))
            ->add('reduce', CheckboxType::class, array(
                'label' => 'form.reduce',
                'required' => false
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ADA\PurchaseBundle\Entity\Customer'
        ));
    }
}