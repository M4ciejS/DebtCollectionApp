<?php

namespace DebtCollectionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DebtCaseDocumentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->
        add('identificationCode')->
        add('creationDate')->
        add('paymentDate')->
        add('amount')
        //add('debtCase',null,['choice_label' => 'identificationCode'])  pole wyboru sprawy do ktorej dodaje dokument
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DebtCollectionBundle\Entity\DebtCaseDocument'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'debtcollectionbundle_debtcasedocument';
    }


}
