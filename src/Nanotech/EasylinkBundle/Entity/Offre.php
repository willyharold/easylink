<?php

namespace Nanotech\EasylinkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity(repositoryClass="Nanotech\EasylinkBundle\Repository\OffreRepository")
 */
class Offre
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
     * @ORM\Column(name="description", type="text", length=255)
     */
    private $description;



    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text", length=255)
     */
    private $adresse;



    /**
     * @var int
     *
     * @ORM\Column(name="code_postale", type="integer")
     */
    private $codePostale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEn", type="datetime")
     */
    private $dateEn;

     /**
    * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\sousSpecialite")
    * @ORM\JoinColumn(nullable=false) 
    */
    private $sous_specialite;

    /**
     * @ORM\ManyToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=true)
     */
    private $client;

    /**
     * @ORM\OneToOne(targetEntity="Nanotech\EasylinkBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(nullable=true)
     */
    private $artisan;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

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
     * Set objet
     *
     * @param string $objet
     *
     * @return Offre
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Offre
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

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Offre
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
     * Set deTravaux
     *
     * @param string $deTravaux
     *
     * @return Offre
     */
    public function setDeTravaux($deTravaux)
    {
        $this->deTravaux = $deTravaux;

        return $this;
    }

    /**
     * Get deTravaux
     *
     * @return string
     */
    public function getDeTravaux()
    {
        return $this->deTravaux;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Offre
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
     * Set adressecom
     *
     * @param string $adressecom
     *
     * @return Offre
     */
    public function setAdressecom($adressecom)
    {
        $this->adressecom = $adressecom;

        return $this;
    }

    /**
     * Get adressecom
     *
     * @return string
     */
    public function getAdressecom()
    {
        return $this->adressecom;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Offre
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set codePostale
     *
     * @param integer $codePostale
     *
     * @return Offre
     */
    public function setCodePostale($codePostale)
    {
        $this->codePostale = $codePostale;

        return $this;
    }

    /**
     * Get codePostale
     *
     * @return int
     */
    public function getCodePostale()
    {
        return $this->codePostale;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return Offre
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set paiement
     *
     * @param string $paiement
     *
     * @return Offre
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;

        return $this;
    }

    /**
     * Get paiement
     *
     * @return string
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return Offre
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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Offre
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
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
     * Set dateEn
     *
     * @param \DateTime $dateEn
     *
     * @return Offre
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
    
    function getPhoto1() {
        return $this->photo1;
    }

    function getPhoto2() {
        return $this->photo2;
    }

    function getPhoto3() {
        return $this->photo3;
    }

    function setPhoto1($photo1) {
        $this->photo1 = $photo1;
    }

    function setPhoto2($photo2) {
        $this->photo2 = $photo2;
    }

    function setPhoto3($photo3) {
        $this->photo3 = $photo3;
    }

    
    

public function __construct()
    {
        $this->dateEn = new \DateTime();

    }
    
    function getSous_specialite() {
        return $this->sous_specialite;
    }

    function setSous_specialite($sous_specialite) {
        $this->sous_specialite = $sous_specialite;
    }





}

