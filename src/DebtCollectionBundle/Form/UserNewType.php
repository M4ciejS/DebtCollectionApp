<?php
/**
 * Created by PhpStorm.
 * User: m4ciej
 * Date: 21.12.16
 * Time: 19:28
 */

namespace DebtCollectionBundle\Form;


use DebtCollectionBundle\Form\Type\RoleType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserNewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('plainpassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => array('attr' => array('class' => 'password-field')),
                'required' => true,
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
            ->add('email')
            ->add('roles', CollectionType::class, array(
                'entry_type' => RoleType::class,
                'label' => false,
                'entry_options' => array(
                    'label' => "Roles",
                    'choices' => array(
                        'User' => 'ROLE_USER',
                        'Admin' => 'ROLE_ADMIN',
                        'Super Admin' => 'ROLE_SUPER_ADMIN',
                    ),
                    'choices_as_values' => true,
                ),
            ))
            /*->add('roles', RoleType::class, array(
                'placeholder' => 'Choose a role',
            ))*/
            ->add('enabled')
            ->add('locked')
            ->add('save', SubmitType::class);
    }
}