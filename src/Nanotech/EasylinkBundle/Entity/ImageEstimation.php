<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageEstimation
 *
 * @ORM\Table(name="image_estimation")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\ImageEstimationRepository")
 */
class ImageEstimation
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
     * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Estimation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $estimation;


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

    /**
     * Set estimation
     *
     * @param \Nanotech\EasylinkBundle\Entity\Estimation $estimation
     *
     * @return ImageEstimation
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
