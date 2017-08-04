<?php

namespace ADA\PurchaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class CustomerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'form.name'
            ))
            ->add('firstName', TextType::class, array(
                'label' => 'form.firstName'
            ))
            ->add('country', CountryType::class, array(
                'label' => 'form.country'
            ))
            ->add('birthDate', BirthdayType::class, array(
                'label' => 'form.birthDate'
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