<?php
/**
 * Created by PhpStorm.
 * User: m4ciej
 * Date: 22.12.16
 * Time: 15:06
 */

namespace DebtCollectionBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RoleType extends AbstractType
{
    private $roles;

    public function __construct(array $roles)
    {
        $this->roles = $roles;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => $this->roles,
            'choices_as_values' => true,
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}