<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="avis")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\AvisRepository")
 */
class Avis
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
     * @ORM\Column(name="contenu", type="text", length=255, nullable=true)
     */
    private $contenu;

    /**
     * @var int
     *
     * @ORM\Column(name="Note", type="integer")
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="amelioration", type="text", length=255)
     */
    private $amelioration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEn", type="datetime", length=255)
     */
    private $dateEn;
    
      /**
    * @ORM\OneToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Offre",mappedBy="avis")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $offre;
    
      /**
    * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Utilisateur")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $client;


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
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Avis
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return Avis
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set amelioration
     *
     * @param string $amelioration
     *
     * @return Avis
     */
    public function setAmelioration($amelioration)
    {
        $this->amelioration = $amelioration;

        return $this;
    }

    /**
     * Get amelioration
     *
     * @return string
     */
    public function getAmelioration()
    {
        return $this->amelioration;
    }

    /**
     * Set dateEn
     *
     * @param \DateTime $dateEn
     *
     * @return Avis
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



    function setOffre($offre) {
        $this->offre = $offre;
    }


public function __construct()
    {
        $this->dateEn = new \DateTime();

    }

    /**
     * Set client
     *
     * @param \Nanotech\EasylinkBundle\Entity\Utilisateur $client
     *
     * @return Avis
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
}
