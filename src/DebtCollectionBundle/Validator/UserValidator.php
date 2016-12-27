<?php
/**
 * Created by PhpStorm.
 * User: m4ciej
 * Date: 22.12.16
 * Time: 13:06
 */

namespace DebtCollectionBundle\Validator;


use DebtCollectionBundle\Entity\User;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class UserValidator
{
    /**
     * @param User $user
     * @param ExecutionContextInterface $context
     */
    public static function validate($user, ExecutionContextInterface $context)
    {
        /**
         * @TODO change this to use parameters
         */
        $roles = ['ROLE_USER', 'ROLE_ADMIN', 'ROLE_SUPER_ADMIN'];
        if (!in_array($user->getRoles()[0], $roles)) {
            $context->buildViolation('Unsupported role!' . $user->getRoles()[0])
                ->atPath('Roles')
                ->addViolation();
        }
    }
}