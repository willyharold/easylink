<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageOffre
 *
 * @ORM\Table(name="image_offre")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\ImageOffreRepository")
 */
class ImageOffre
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
     * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Offre")
     * @ORM\JoinColumn(nullable=true)
     */
    private $offre;


    /**
     * @ORM\OneToOne(targetEntity="Nanotech\MediaBundle\Entity\Media")
     * @ORM\JoinColumn(nullable=true)
     */
    private $photo;

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
     * Set offre
     *
     * @param \Nanotech\EasylinkBundle\Entity\Offre $offre
     *
     * @return ImageOffre
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
     * Set photo
     *
     * @param \Nanotech\MediaBundle\Entity\Media $photo
     *
     * @return ImageOffre
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
}
