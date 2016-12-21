<?php

namespace DebtCollectionBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="DebtCollectionBundle\Repository\ClientRepository")
 */
class Client
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
     * @ORM\Column(name="identification_code",type="string",length=255,unique=true)
     *
     */
    private $identificationCode;
    /**
     * @ORM\OneToMany(targetEntity="Address",mappedBy="client")
     */
    private $addresses;
    /**
     * @ORM\OneToMany(targetEntity="Contact",mappedBy="client")
     */
    private $contacts;
    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="DebtCase",mappedBy="debtor")
     */
    private $debtorCases;
    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="DebtCase",mappedBy="creditor")
     */
    private $creditorCases;
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set identificationCode
     *
     * @param string $identificationCode
     * @return Client
     */
    public function setIdentificationCode($identificationCode)
    {
        $this->identificationCode = $identificationCode;

        return $this;
    }

    /**
     * Get identificationCode
     *
     * @return string
     */
    public function getIdentificationCode()
    {
        return $this->identificationCode;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->debtCases = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add debtCases
     *
     * @param \DebtCollectionBundle\Entity\DebtCase $debtCases
     * @return Client
     */
    public function addDebtCase(\DebtCollectionBundle\Entity\DebtCase $debtCases)
    {
        $this->debtCases[] = $debtCases;

        return $this;
    }

    /**
     * Remove debtCases
     *
     * @param \DebtCollectionBundle\Entity\DebtCase $debtCases
     */
    public function removeDebtCase(\DebtCollectionBundle\Entity\DebtCase $debtCases)
    {
        $this->debtCases->removeElement($debtCases);
    }

    /**
     * Get debtCases
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDebtCases()
    {
        return $this->debtCases;
    }

    /**
     * Add debtorCases
     *
     * @param \DebtCollectionBundle\Entity\DebtCase $debtorCases
     * @return Client
     */
    public function addDebtorCase(\DebtCollectionBundle\Entity\DebtCase $debtorCases)
    {
        $this->debtorCases[] = $debtorCases;

        return $this;
    }

    /**
     * Remove debtorCases
     *
     * @param \DebtCollectionBundle\Entity\DebtCase $debtorCases
     */
    public function removeDebtorCase(\DebtCollectionBundle\Entity\DebtCase $debtorCases)
    {
        $this->debtorCases->removeElement($debtorCases);
    }

    /**
     * Get debtorCases
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDebtorCases()
    {
        return $this->debtorCases;
    }

    /**
     * Add creditorCases
     *
     * @param \DebtCollectionBundle\Entity\DebtCase $creditorCases
     * @return Client
     */
    public function addCreditorCase(\DebtCollectionBundle\Entity\DebtCase $creditorCases)
    {
        $this->creditorCases[] = $creditorCases;

        return $this;
    }

    /**
     * Remove creditorCases
     *
     * @param \DebtCollectionBundle\Entity\DebtCase $creditorCases
     */
    public function removeCreditorCase(\DebtCollectionBundle\Entity\DebtCase $creditorCases)
    {
        $this->creditorCases->removeElement($creditorCases);
    }

    /**
     * Get creditorCases
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCreditorCases()
    {
        return $this->creditorCases;
    }

    /**
     * @return bool
     */
    public function hasCases(){
        if ((count($this->creditorCases) > 0) || (count($this->debtorCases) > 0)) {
            return true;
        }
        return false;
    }

    /**
     * Add addresses
     *
     * @param \DebtCollectionBundle\Entity\Address $addresses
     * @return Client
     */
    public function addAddress(\DebtCollectionBundle\Entity\Address $addresses)
    {
        $this->addresses[] = $addresses;

        return $this;
    }

    /**
     * Remove addresses
     *
     * @param \DebtCollectionBundle\Entity\Address $addresses
     */
    public function removeAddress(\DebtCollectionBundle\Entity\Address $addresses)
    {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @return bool
     */
    public function hasAddressess(){
        if(count($this->addresses)>0){
            return true;
        }
        return false;
    }

    /**
     * Add contacts
     *
     * @param \DebtCollectionBundle\Entity\Contact $contacts
     * @return Client
     */
    public function addContact(\DebtCollectionBundle\Entity\Contact $contacts)
    {
        $this->contacts[] = $contacts;

        return $this;
    }

    /**
     * Remove contacts
     *
     * @param \DebtCollectionBundle\Entity\Contact $contacts
     */
    public function removeContact(\DebtCollectionBundle\Entity\Contact $contacts)
    {
        $this->contacts->removeElement($contacts);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    public function hasContacts(){
        if(count($this->contacts)>0){
            return true;
        }
        return false;
    }
}
