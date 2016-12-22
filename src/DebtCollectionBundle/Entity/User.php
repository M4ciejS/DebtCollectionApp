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
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @Assert\Callback({"DebtCollectionBundle\Validator\UserValidator", "validate"})
 * @UniqueEntity("username")
 * @UniqueEntity("email")
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
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $creationDate;
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
    protected $roles;
    public function __construct()
    {
        parent::__construct();

    }

    public function setCreationDate(\DateTime $date)
    {
        $this->creationDate = $date;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }
    /*public function addRole($role)
    {
        $role = strtoupper($role);
        if(isset($this->roles)){
            unset($this->roles);
        }
        $this->roles[0]=$role;
        return $this;
    }
    public function setRoles(array $roles)
    {
        $this->roles = array();
        $this->addRole($roles[0]);
        return $this;
    }*/
}
