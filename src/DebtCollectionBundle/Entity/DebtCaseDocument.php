<?php

namespace DebtCollectionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * DebtCaseDocument
 * @ORM\Table(name="debt_case_document", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="debtcase_debtcasedocument", columns={"identificationCode","debt_case_id"})
 * })
 * @UniqueEntity("identificationCode")
 * @ORM\Entity(repositoryClass="DebtCollectionBundle\Repository\DebtCaseDocumentRepository")
 */
class DebtCaseDocument
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
     * @var
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="DebtCase",inversedBy="documents")
     */
    private $debtCase;
    /**
     * @var string
     *
     * @ORM\Column(name="identificationCode", type="string", length=255,unique=true)
     */
    private $identificationCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="date")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="paymentDate", type="date")
     */
    private $paymentDate;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;


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
     * Set identificationCode
     *
     * @param string $identificationCode
     * @return DebtCaseDocument
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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return DebtCaseDocument
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set paymentDate
     *
     * @param \DateTime $paymentDate
     * @return DebtCaseDocument
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    /**
     * Get paymentDate
     *
     * @return \DateTime 
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return DebtCaseDocument
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set debtCase
     *
     * @param \DebtCollectionBundle\Entity\DebtCase $debtCase
     * @return DebtCaseDocument
     */
    public function setDebtCase(\DebtCollectionBundle\Entity\DebtCase $debtCase = null)
    {
        $this->debtCase = $debtCase;

        return $this;
    }

    /**
     * Get debtCase
     *
     * @return \DebtCollectionBundle\Entity\DebtCase 
     */
    public function getDebtCase()
    {
        return $this->debtCase;
    }
}
