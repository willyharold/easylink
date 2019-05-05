<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\ContactRepository")
 */
class Contact
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
     * @var int
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;

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
    private $artisan;

    /**
     * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Offre")
     * @ORM\JoinColumn(nullable=true)
     */
    private $offre;

    /**
     * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Estimation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $estimation;



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
     * Set etat
     *
     * @param integer $etat
     *
     * @return Contact
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set dateEn
     *
     * @param \DateTime $dateEn
     *
     * @return Contact
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

    public function __construct()
    {
        $this->etat = 0;
        $this->dateEn = new \DateTime();

    }


    /**
     * Set artisan
     *
     * @param \Nanotech\EasylinkBundle\Entity\Utilisateur $artisan
     *
     * @return Contact
     */
    public function setArtisan(\Nanotech\EasylinkBundle\Entity\Utilisateur $artisan)
    {
        $this->artisan = $artisan;

        return $this;
    }

    /**
     * Get artisan
     *
     * @return \Nanotech\EasylinkBundle\Entity\Utilisateur
     */
    public function getArtisan()
    {
        return $this->artisan;
    }

    /**
     * Set client
     *
     * @param \Nanotech\EasylinkBundle\Entity\Utilisateur $client
     *
     * @return Contact
     */
    public function setClient(\Nanotech\EasylinkBundle\Entity\Utilisateur $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Nanotech\EasylinkBundle\Entity\Utilisateur
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set offre
     *
     * @param \Nanotech\EasylinkBundle\Entity\Offre $offre
     *
     * @return Contact
     */
    public function setOffre(\Nanotech\EasylinkBundle\Entity\Offre $offre = null)
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
     * Set estimation
     *
     * @param \Nanotech\EasylinkBundle\Entity\Estimation $estimation
     *
     * @return Contact
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
