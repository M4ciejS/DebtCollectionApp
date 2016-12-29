<?php
/**
 * Created by PhpStorm.
 * User: m4ciej
 * Date: 28.12.16
 * Time: 20:16
 */

namespace DebtCollectionBundle\Model;


class RoleHelper
{

    private $roles;

    public function __construct($roles)
    {
        $this->roles = $roles;
    }

    public function getRoles()
    {
        return $this->roles = array_unique($this->roles);
    }
}