<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="type", type="string", length=255, unique=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", unique=true)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEn", type="datetime", unique=true)
     */
    private $dateEn;
    
     /**
    * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Affectation")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $affectation; 


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
     * Set type
     *
     * @param string $type
     *
     * @return Message
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Message
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
     * Set dateEn
     *
     * @param \DateTime $dateEn
     *
     * @return Message
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
    
    function getAffectation() {
        return $this->affectation;
    }

    function setAffectation($affectation) {
        $this->affectation = $affectation;
    }


}

