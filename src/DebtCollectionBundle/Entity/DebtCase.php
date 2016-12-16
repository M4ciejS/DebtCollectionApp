<?php

namespace DebtCollectionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * DebtCase
 *
 * @ORM\Table(name="debt_case", uniqueConstraints={
 *      @ORM\UniqueConstraint(name="debtor_creditor_case", columns={"identificationCode","debtor_id", "creditor_id"})
 * })
 * @ORM\Entity(repositoryClass="DebtCollectionBundle\Repository\DebtCaseRepository")
 * @UniqueEntity("identificationCode")
 */
class DebtCase
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
     * @ORM\OneToMany(targetEntity="DebtCaseDocument",mappedBy="debtCase")
     */
    private $documents;

    /**
     * @var string
     *
     * @ORM\Column(name="identificationCode", type="string", length=255,unique=true)
     */
    private $identificationCode;

    /**
     * @var \DateTime
     * @Assert\NotNull()
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate ;

    /**
     * @var string
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="Client",inversedBy="debtorCases")
     */
    private $debtor;
    /**
     * @var string
     * @Assert\NotNull()
     * @ORM\ManyToOne(targetEntity="Client",inversedBy="creditorCases")
     */
    private $creditor;

    /**
     * DebtCase constructor.
     * @param int $id
     */
    public function __construct()
    {
        $this->creationDate = new \DateTime('now');
    }


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
     * @return DebtCase
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
     * @return DebtCase
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
     * Set debtor
     *
     * @param string $debtor
     * @return DebtCase
     */
    public function setDebtor($debtor)
    {
        $this->debtor = $debtor;

        return $this;
    }

    /**
     * Get debtor
     *
     * @return string 
     */
    public function getDebtor()
    {
        return $this->debtor;
    }

    /**
     * Set creditor
     *
     * @param string $creditor
     * @return DebtCase
     */
    public function setCreditor($creditor)
    {
        $this->creditor = $creditor;

        return $this;
    }

    /**
     * Get creditor
     *
     * @return string 
     */
    public function getCreditor()
    {
        return $this->creditor;
    }

    /**
     * @return bool
     * @Assert\Callback
     */
    public function debtorCreditorUnique(ExecutionContextInterface $context){
        if($this->creditor===$this->debtor){
            $context->buildViolation('Debtor and creditor must be different')
                ->addViolation();
        }
    }
    /**
     * Add documents
     *
     * @param \DebtCollectionBundle\Entity\DebtCaseDocument $documents
     * @return DebtCase
     */
    public function addDocument(\DebtCollectionBundle\Entity\DebtCaseDocument $documents)
    {
        $this->documents[] = $documents;

        return $this;
    }

    /**
     * Remove documents
     *
     * @param \DebtCollectionBundle\Entity\DebtCaseDocument $documents
     */
    public function removeDocument(\DebtCollectionBundle\Entity\DebtCaseDocument $documents)
    {
        $this->documents->removeElement($documents);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDocuments()
    {
        return $this->documents;
    }
    public function hasDocuments(){
        if(count($this->documents)>0){
            return true;
        }
        return false;
    }
}
