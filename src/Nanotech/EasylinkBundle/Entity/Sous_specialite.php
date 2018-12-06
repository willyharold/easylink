<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sous_specialite
 *
 * @ORM\Table(name="sous_specialite")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\Sous_specialiteRepository")
 */
class Sous_specialite
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
     * @ORM\Column(name="nom", type="text", unique=true)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="tarif", type="float", unique=true)
     */
    private $tarif;

    /**
     * @var string
     *
     * @ORM\Column(name="de_courte", type="text", unique=true)
     */
    private $deCourte;

    /**
     * @var string
     *
     * @ORM\Column(name="de_longue", type="text", unique=true)
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
     * @return Sous_specialite
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
     * @return Sous_specialite
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
     * @return Sous_specialite
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
     * @return Sous_specialite
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
    
    function getPhoto() {
        return $this->photo;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function getSpecialite() {
        return $this->specialite;
    }

    function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }



}

