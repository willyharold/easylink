<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estimation
 *
 * @ORM\Table(name="estimation")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\EstimationRepository")
 */
class Estimation
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
     * Get id
     *
     * @return int
     */

    /**
     * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Specialite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialite;

    /**
     * @ORM\ManyToMany(targetEntity="Nanotech\EasylinkBundle\Entity\sousSpecialite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousSpecialite;

    /**
     * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=true)
     */
    private $artisan;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEn", type="datetime")
     */
    private $dateEn;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="typeBien", type="string", length=255)
     */
    private $typeBien;

    /**
     * @var string
     *
     * @ORM\Column(name="debuttravaux", type="string", length=255)
     */
    private $debuttravaux;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text", length=255)
     */
    private $adresse;


    /**
     * @var string
     *
     * @ORM\Column(name="materiel_fenetre", type="text", length=255,nullable=true)
     */
    private $materielFenetre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=255,nullable=true)
     */
    private $description;



    /**
     * @var string
     *
     * @ORM\Column(name="nbr_ouverture_fenetre", type="integer",nullable=true)
     */
    private $nbrOuvertureFenetre;

    /**
     * @var int
     *
     * @ORM\Column(name="code_postale", type="integer")
     */
    private $codePostale;

    /**
     * @ORM\OneToMany(targetEntity="Nanotech\EasylinkBundle\Entity\ImageEstimation", mappedBy="estimation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $imageOffre;

    /**
     * @ORM\OneToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Avis", inversedBy="estimation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $avis;



    public function getId()
    {
        return $this->id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dateEn = new \DateTime();
        $this->sousSpecialite = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set specialite
     *
     * @param \Nanotech\EasylinkBundle\Entity\Specialite $specialite
     *
     * @return Estimation
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

    /**
     * Add sousSpecialite
     *
     * @param \Nanotech\EasylinkBundle\Entity\sousSpecialite $sousSpecialite
     *
     * @return Estimation
     */
    public function addSousSpecialite(\Nanotech\EasylinkBundle\Entity\sousSpecialite $sousSpecialite)
    {
        $this->sousSpecialite[] = $sousSpecialite;

        return $this;
    }

    /**
     * Remove sousSpecialite
     *
     * @param \Nanotech\EasylinkBundle\Entity\sousSpecialite $sousSpecialite
     */
    public function removeSousSpecialite(\Nanotech\EasylinkBundle\Entity\sousSpecialite $sousSpecialite)
    {
        $this->sousSpecialite->removeElement($sousSpecialite);
    }

    /**
     * Get sousSpecialite
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSousSpecialite()
    {
        return $this->sousSpecialite;
    }

    /**
     * Set client
     *
     * @param \Nanotech\EasylinkBundle\Entity\Utilisateur $client
     *
     * @return Estimation
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

    /**
     * Set artisan
     *
     * @param \Nanotech\EasylinkBundle\Entity\Utilisateur $artisan
     *
     * @return Estimation
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
     * Set dateEn
     *
     * @param \DateTime $dateEn
     *
     * @return Estimation
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Estimation
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
     * @return Estimation
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
     * Add imageOffre
     *
     * @param \Nanotech\EasylinkBundle\Entity\ImageEstimation $imageOffre
     *
     * @return Estimation
     */
    public function addImageOffre(\Nanotech\EasylinkBundle\Entity\ImageEstimation $imageOffre)
    {
        $this->imageOffre[] = $imageOffre;

        return $this;
    }

    /**
     * Remove imageOffre
     *
     * @param \Nanotech\EasylinkBundle\Entity\ImageEstimation $imageOffre
     */
    public function removeImageOffre(\Nanotech\EasylinkBundle\Entity\ImageEstimation $imageOffre)
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

    /**
     * Set avis
     *
     * @param \Nanotech\EasylinkBundle\Entity\Avis $avis
     *
     * @return Estimation
     */
    public function setAvis(\Nanotech\EasylinkBundle\Entity\Avis $avis = null)
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * Get avis
     *
     * @return \Nanotech\EasylinkBundle\Entity\Avis
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * Set typeBien
     *
     * @param string $typeBien
     *
     * @return Estimation
     */
    public function setTypeBien($typeBien)
    {
        $this->typeBien = $typeBien;

        return $this;
    }

    /**
     * Get typeBien
     *
     * @return string
     */
    public function getTypeBien()
    {
        return $this->typeBien;
    }

    /**
     * Set debuttravaux
     *
     * @param string $debuttravaux
     *
     * @return Estimation
     */
    public function setDebuttravaux($debuttravaux)
    {
        $this->debuttravaux = $debuttravaux;

        return $this;
    }

    /**
     * Get debuttravaux
     *
     * @return string
     */
    public function getDebuttravaux()
    {
        return $this->debuttravaux;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Estimation
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set materielFenetre
     *
     * @param string $materielFenetre
     *
     * @return Estimation
     */
    public function setMaterielFenetre($materielFenetre)
    {
        $this->materielFenetre = $materielFenetre;

        return $this;
    }

    /**
     * Get materielFenetre
     *
     * @return string
     */
    public function getMaterielFenetre()
    {
        return $this->materielFenetre;
    }

    /**
     * Set nbrOuvertureFenetre
     *
     * @param integer $nbrOuvertureFenetre
     *
     * @return Estimation
     */
    public function setNbrOuvertureFenetre($nbrOuvertureFenetre)
    {
        $this->nbrOuvertureFenetre = $nbrOuvertureFenetre;

        return $this;
    }

    /**
     * Get nbrOuvertureFenetre
     *
     * @return integer
     */
    public function getNbrOuvertureFenetre()
    {
        return $this->nbrOuvertureFenetre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Estimation
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
}
