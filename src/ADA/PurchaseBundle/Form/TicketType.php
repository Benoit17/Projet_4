<?php

namespace ADA\PurchaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class TicketType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateTimeType::class, array(
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd-MM-y',
                "attr" => array(
                    'class' => 'datepicker',
                    'placeholder' => 'Date'
                )
            ))
            ->add('type', ChoiceType::class, array(
                'choices'  => array(
                    'form.day' => true,
                    'form.halfDay' => false),
                'expanded' => true,
                'choice_attr' => function($val, $key, $index) {
                    // adds a class like attending_yes, attending_no, etc
                    return ['class' => 'checkboxradio'];
                },
            ))
            ->add('number', NumberType::class, array(
                "attr" => array(
                    'class' => 'spinner',
                    'placeholder' => 'form.number'
                )
            ))
            ->add('email', RepeatedType::class, array(
                'type' => EmailType::class,
                'required' => true,
                'first_options'  => array('attr' => array('placeholder' => 'form.email')),
                'second_options' => array('attr' => array('placeholder' => 'form.confirmEmail'))
            ))
            ->add('customers', CollectionType::class, array(
                'entry_type'   => CustomerType::class,
                'allow_add'    => true,
                'allow_delete' => true,
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ADA\PurchaseBundle\Entity\Ticket'
        ));
    }
}

