<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specialite
 *
 * @ORM\Table(name="specialite")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\SpecialiteRepository")
 */
class Specialite
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
     * @var string
     *
     * @ORM\Column(name="De_courte", type="text", unique=true)
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
    private  $image;


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
     * @return Specialite
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
     * Set deCourte
     *
     * @param string $deCourte
     *
     * @return Specialite
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
     * @return Specialite
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
    
    function getImage() {
        return $this->image;
    }

    function setImage($image) {
        $this->image = $image;
    }


}

