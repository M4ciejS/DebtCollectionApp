<?php
/**
 * Created by PhpStorm.
 * User: m4ciej
 * Date: 16.12.16
 * Time: 11:19
 */

namespace DebtCollectionBundle\Entity;


use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters"
     * )
     */
    protected $username;
    /**
     * @var
     * @Assert\Length(
     *     min = 8,
     *     max = 50,
     *     minMessage = "Password must be at least {{ limit }} characters long",
     *     maxMessage = "Password may not be longer than {{ limit }} characters"
     * )
     */
    protected $plainPassword;
    /**
     * @var array
     * @Assert\Choice({"ROLE_USER", "ROLE_ADMIN", "ROLE_SUPER_ADMIN"})
     */
    protected $roles;
    public function __construct()
    {
        parent::__construct();

    }
}
