<?php
/**
 * Created by PhpStorm.
 * User: Chohee
 * Date: 4/13/17
 * Time: 5:54 PM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_studentEmail', EmailType::class, array('label' => 'Email'))
            ->add('_password', PasswordType::class, array('label' => 'Password'))
        ;
    }
}