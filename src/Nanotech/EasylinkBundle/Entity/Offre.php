<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\OffreRepository")
 */
class Offre
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
     * @ORM\Column(name="description", type="text", length=255)
     */
    private $description;



    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text", length=255)
     */
    private $adresse;



    /**
     * @var int
     *
     * @ORM\Column(name="code_postale", type="integer")
     */
    private $codePostale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEn", type="datetime")
     */
    private $dateEn;

     /**
    * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\sousSpecialite")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $sous_specialite;

    /**
     * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;

    /**
     * @ORM\OneToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=true)
     */
    private $artisan;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;


    /**
     * @ORM\OneToMany(targetEntity="Nanotech\EasylinkBundle\Entity\ImageOffre", mappedBy="offre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $imageOffre;

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
     * Set description
     *
     * @param string $description
     *
     * @return Offre
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Offre
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostale
     *
     * @param integer $codePostale
     *
     * @return Offre
     */
    public function setCodePostale($codePostale)
    {
        $this->codePostale = $codePostale;

        return $this;
    }

    /**
     * Get codePostale
     *
     * @return integer
     */
    public function getCodePostale()
    {
        return $this->codePostale;
    }

    /**
     * Set dateEn
     *
     * @param \DateTime $dateEn
     *
     * @return Offre
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
     * Set etat
     *
     * @param string $etat
     *
     * @return Offre
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set sousSpecialite
     *
     * @param \Nanotech\EasylinkBundle\Entity\sousSpecialite $sousSpecialite
     *
     * @return Offre
     */
    public function setSousSpecialite(\Nanotech\EasylinkBundle\Entity\sousSpecialite $sousSpecialite)
    {
        $this->sous_specialite = $sousSpecialite;

        return $this;
    }

    /**
     * Get sousSpecialite
     *
     * @return \Nanotech\EasylinkBundle\Entity\sousSpecialite
     */
    public function getSousSpecialite()
    {
        return $this->sous_specialite;
    }

    /**
     * Set client
     *
     * @param \Nanotech\EasylinkBundle\Entity\Utilisateur $client
     *
     * @return Offre
     */
    public function setClient(\Nanotech\EasylinkBundle\Entity\Utilisateur $client = null)
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
     * Set artisan
     *
     * @param \Nanotech\EasylinkBundle\Entity\Utilisateur $artisan
     *
     * @return Offre
     */
    public function setArtisan(\Nanotech\EasylinkBundle\Entity\Utilisateur $artisan = null)
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
     * Add imageOffre
     *
     * @param \Nanotech\EasylinkBundle\Entity\ImageOffre $imageOffre
     *
     * @return Offre
     */
    public function addImageOffre(\Nanotech\EasylinkBundle\Entity\ImageOffre $imageOffre)
    {
        $this->imageOffre[] = $imageOffre;

        return $this;
    }

    /**
     * Remove imageOffre
     *
     * @param \Nanotech\EasylinkBundle\Entity\ImageOffre $imageOffre
     */
    public function removeImageOffre(\Nanotech\EasylinkBundle\Entity\ImageOffre $imageOffre)
    {
        $this->imageOffre->removeElement($imageOffre);
    }

    /**
     * Get imageOffre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImageOffre()
    {
        return $this->imageOffre;
    }

    public function __toString()
    {
        return "".$this->getId()." - ".$this->getSousSpecialite();
    }


}
