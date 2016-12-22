<?php
/**
 * Created by PhpStorm.
 * User: m4ciej
 * Date: 22.12.16
 * Time: 14:20
 */

namespace DebtCollectionBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class UserDeleteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setMethod('DELETE')
            ->add('Delete', SubmitType::class, ['attr' => ['class' => 'btn-danger']]);
    }
}