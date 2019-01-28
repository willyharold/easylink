<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * sousSpecialite
 *
 * @ORM\Table(name="sous_specialite")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\sousSpecialiteRepository")
 */
class sousSpecialite
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
     * @ORM\Column(name="nom", type="text", nullable=true)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="tarif", type="float", nullable=true)
     */
    private $tarif;

    /**
     * @var string
     *
     * @ORM\Column(name="deCourte", type="text", nullable=true)
     */
    private $deCourte;

    /**
     * @var string
     *
     * @ORM\Column(name="deLongue", type="text", nullable=true)
     */
    private $deLongue;
    
     /**
     * @ORM\OneToOne(targetEntity="Nanotech\MediaBundle\Entity\Media", cascade={"all"})
     * @ORM\JoinColumn(nullable=true)
     */
    private  $photo;
    
     /**
    * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Specialite")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $specialite; 



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
     * Set nom
     *
     * @param string $nom
     *
     * @return sousSpecialite
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set tarif
     *
     * @param float $tarif
     *
     * @return sousSpecialite
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return float
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * Set deCourte
     *
     * @param string $deCourte
     *
     * @return sousSpecialite
     */
    public function setDeCourte($deCourte)
    {
        $this->deCourte = $deCourte;

        return $this;
    }

    /**
     * Get deCourte
     *
     * @return string
     */
    public function getDeCourte()
    {
        return $this->deCourte;
    }

    /**
     * Set deLongue
     *
     * @param string $deLongue
     *
     * @return sousSpecialite
     */
    public function setDeLongue($deLongue)
    {
        $this->deLongue = $deLongue;

        return $this;
    }

    /**
     * Get deLongue
     *
     * @return string
     */
    public function getDeLongue()
    {
        return $this->deLongue;
    }

    /**
     * Set photo
     *
     * @param \Nanotech\MediaBundle\Entity\Media $photo
     *
     * @return sousSpecialite
     */
    public function setPhoto(\Nanotech\MediaBundle\Entity\Media $photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return \Nanotech\MediaBundle\Entity\Media
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set specialite
     *
     * @param \Nanotech\EasylinkBundle\Entity\Specialite $specialite
     *
     * @return sousSpecialite
     */
    public function setSpecialite(\Nanotech\EasylinkBundle\Entity\Specialite $specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get specialite
     *
     * @return \Nanotech\EasylinkBundle\Entity\Specialite
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }
}
