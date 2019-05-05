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
    * @ORM\OneToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Offre")
    * @ORM\JoinColumn(nullable=true)
    */
    private $offre;

    /**
     * @ORM\OneToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Estimation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $estimation;


    
    /**
    * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Utilisateur")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $artisan1;

    /**
     * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $artisan2;

    /**
     * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $artisan3;


    public function __construct()
    {
        $this->dateEn = new \DateTime();

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

    /**
     * Set offre
     *
     * @param \Nanotech\EasylinkBundle\Entity\Offre $offre
     *
     * @return Affectation
     */
    public function setOffre(\Nanotech\EasylinkBundle\Entity\Offre $offre)
    {
        $this->offre = $offre;

        return $this;
    }

    /**
     * Get offre
     *
     * @return \Nanotech\EasylinkBundle\Entity\Offre
     */
    public function getOffre()
    {
        return $this->offre;
    }



    /**
     * Set artisan1
     *
     * @param \Nanotech\EasylinkBundle\Entity\Utilisateur $artisan1
     *
     * @return Affectation
     */
    public function setArtisan1(\Nanotech\EasylinkBundle\Entity\Utilisateur $artisan1)
    {
        $this->artisan1 = $artisan1;

        return $this;
    }

    /**
     * Get artisan1
     *
     * @return \Nanotech\EasylinkBundle\Entity\Utilisateur
     */
    public function getArtisan1()
    {
        return $this->artisan1;
    }

    /**
     * Set artisan2
     *
     * @param \Nanotech\EasylinkBundle\Entity\Utilisateur $artisan2
     *
     * @return Affectation
     */
    public function setArtisan2(\Nanotech\EasylinkBundle\Entity\Utilisateur $artisan2)
    {
        $this->artisan2 = $artisan2;

        return $this;
    }

    /**
     * Get artisan2
     *
     * @return \Nanotech\EasylinkBundle\Entity\Utilisateur
     */
    public function getArtisan2()
    {
        return $this->artisan2;
    }

    /**
     * Set artisan3
     *
     * @param \Nanotech\EasylinkBundle\Entity\Utilisateur $artisan3
     *
     * @return Affectation
     */
    public function setArtisan3(\Nanotech\EasylinkBundle\Entity\Utilisateur $artisan3)
    {
        $this->artisan3 = $artisan3;

        return $this;
    }

    /**
     * Get artisan3
     *
     * @return \Nanotech\EasylinkBundle\Entity\Utilisateur
     */
    public function getArtisan3()
    {
        return $this->artisan3;
    }

    /**
     * Set estimation
     *
     * @param \Nanotech\EasylinkBundle\Entity\Estimation $estimation
     *
     * @return Affectation
     */
    public function setEstimation(\Nanotech\EasylinkBundle\Entity\Estimation $estimation = null)
    {
        $this->estimation = $estimation;

        return $this;
    }

    /**
     * Get estimation
     *
     * @return \Nanotech\EasylinkBundle\Entity\Estimation
     */
    public function getEstimation()
    {
        return $this->estimation;
    }
}
