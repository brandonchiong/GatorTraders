<?php
/**
 * Created by PhpStorm.
 * User: Joseph
 * Date: 4/3/2017
 * Time: 9:36 AM
 */

// src/AppBundle/Form/UserType.php
// src/AppBundle/Form/UserType.php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_studentEmail', EmailType::class, array('label' => 'Email'))
            ->add('_password', RepeatedType::class, array (
                'type' => PasswordType::class,
                'first_options'=> array('label' => 'Password'),
                'second_options' => array('label' => 'Confirm Password'),
            ))
            ->add('_firstName',TextType::class, array('label' => 'First Name'))
            ->add('_lastName',TextType::class, array('label' => 'Last Name'))
        ;
    }




}
