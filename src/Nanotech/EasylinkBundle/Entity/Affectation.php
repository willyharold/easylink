<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affectation
 *
 * @ORM\Table(name="affectation")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\AffectationRepository")
 */
class Affectation
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateEn", type="datetime")
     */
    private $dateEn;

     /**
    * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Offre")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $offre;
    
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
     * Set dateEn
     *
     * @param \DateTime $dateEn
     *
     * @return Affectation
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
    
    function getOffre() {
        return $this->offre;
    }

    function getUtilisateur() {
        return $this->utilisateur;
    }

    function setOffre($offre) {
        $this->offre = $offre;
    }

    function setUtilisateur($utilisateur) {
        $this->utilisateur = $utilisateur;
    }

    public function __construct()
    {
        $this->dateEn = new \DateTime();

    }

}

