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
     * @ORM\Column(name="nom", type="text", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="De_courte", type="text",length=255)
     */
    private $deCourte;

    /**
     * @var string
     *
     * @ORM\Column(name="de_longue", type="text", length=255)
     */
    private $deLongue;
    
     /**
     * @ORM\OneToOne(targetEntity="Nanotech\MediaBundle\Entity\Media", cascade={"all"})
     * @ORM\JoinColumn(nullable=true)
     */
    private  $image;


    /**
     * @var string
     *
     * @ORM\Column(name="code", type="text", length=255)
     */
    private $code;


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

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "".$this->getNom();
    }



    /**
     * Set code
     *
     * @param string $code
     *
     * @return Specialite
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
