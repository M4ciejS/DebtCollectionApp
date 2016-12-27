<?php
/**
 * Created by PhpStorm.
 * User: m4ciej
 * Date: 27.12.16
 * Time: 20:10
 */

namespace DebtCollectionBundle\Validator;

use DebtCollectionBundle\Entity\DebtCase;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class DebtCaseValidator
{
    /**
     * @param DebtCase $debtCase
     * @param ExecutionContextInterface $context
     */
    public static function validate($debtCase, ExecutionContextInterface $context)
    {
        $regularExpression = "/[0-9]+\/[a-zA-Z]{3}\/[0-9]{4}/";
        if (0 === preg_match($regularExpression, $debtCase->getIdentificationCode())) {
            $context->buildViolation('Wrong identification number pattern!number/code(letters)/year')
                ->atPath('identificationCode')
                ->addViolation();
        }
    }
}