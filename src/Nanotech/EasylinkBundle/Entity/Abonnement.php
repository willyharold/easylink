<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnement
 *
 * @ORM\Table(name="abonnement")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\AbonnementRepository")
 */
class Abonnement
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
     * @var string
     *
     * @ORM\Column(name="transaction", type="text",length=255)
     */
    private $transaction;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text",length=255)
     */
    private $details;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float", length=255)
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEn", type="datetime")
     */
    private $dateEn;
    
     /**
    * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Utilisateur")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $utilisateur; 


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set transaction
     *
     * @param string $transaction
     *
     * @return Abonnement
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return string
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return Abonnement
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set montant
     *
     * @param float $montant
     *
     * @return Abonnement
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set dateEn
     *
     * @param \DateTime $dateEn
     *
     * @return Abonnement
     */
    public function setDateEn($dateEn)
    {
        $this->dateEn = $dateEn;

        return $this;
    }

    /**
     * Get dateEn
     *
     * @return \DateTime
     */
    public function getDateEn()
    {
        return $this->dateEn;
    }
    
    function getUtilisateur() {
        return $this->utilisateur;
    }

    function setUtilisateur($utilisateur) {
        $this->utilisateur = $utilisateur;
    }

  public function __construct()
    {
        $this->dateEn = new \DateTime();

    }
}
