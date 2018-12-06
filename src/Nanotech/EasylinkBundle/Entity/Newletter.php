<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Newletter
 *
 * @ORM\Table(name="newletter")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\NewletterRepository")
 */
class Newletter
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
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEn", type="datetime", unique=true)
     */
    private $dateEn;


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
     * Set email
     *
     * @param string $email
     *
     * @return Newletter
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dateEn
     *
     * @param \DateTime $dateEn
     *
     * @return Newletter
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
}

