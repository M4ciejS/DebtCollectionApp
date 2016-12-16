<?php

namespace DebtCollectionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="DebtCollectionBundle\Repository\AddressRepository")
 */
class Address
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Client",inversedBy="addresses")
     * @Assert\NotNull()
     */
    private $client;
    /**
     * @var string
     * @Assert\NotNull()
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var string
     * @Assert\NotNull()
     * @ORM\Column(name="postalCode", type="string", length=50)
     */
    private $postalCode;

    /**
     * @var string
     * @Assert\NotNull()
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     * @return Address
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set clientId
     *
     * @param \DebtCollectionBundle\Entity\Client $client
     * @return Address
     */
    public function setClient(\DebtCollectionBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return \DebtCollectionBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
}
