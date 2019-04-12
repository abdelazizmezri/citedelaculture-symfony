<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="idUtilisateur", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idutilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="motDePasse", type="string", length=255, nullable=false)
     */
    private $motdepasse;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=255, nullable=true)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="numTel", type="string", length=255, nullable=false)
     */
    private $numtel;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDeNaissance", type="date", nullable=false)
     */
    private $datedenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="roll", type="string", length=255, nullable=false)
     */
    private $roll;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Club", inversedBy="idmembreclub")
     * @ORM\JoinTable(name="abonnement",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idMembreClub", referencedColumnName="idUtilisateur")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idClub", referencedColumnName="idClub")
     *   }
     * )
     */
    private $idclub;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idclub = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
    public function getIdutilisateur(): string
    {
        return $this->idutilisateur;
    }

    /**
     * @param string $idutilisateur
     */
    public function setIdutilisateur(string $idutilisateur): void
    {
        $this->idutilisateur = $idutilisateur;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getMotdepasse(): string
    {
        return $this->motdepasse;
    }

    /**
     * @param string $motdepasse
     */
    public function setMotdepasse(string $motdepasse): void
    {
        $this->motdepasse = $motdepasse;
    }

    /**
     * @return string
     */
    public function getCin(): string
    {
        return $this->cin;
    }

    /**
     * @param string $cin
     */
    public function setCin(string $cin): void
    {
        $this->cin = $cin;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getNumtel(): string
    {
        return $this->numtel;
    }

    /**
     * @param string $numtel
     */
    public function setNumtel(string $numtel): void
    {
        $this->numtel = $numtel;
    }

    /**
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return \DateTime
     */
    public function getDatedenaissance(): \DateTime
    {
        return $this->datedenaissance;
    }

    /**
     * @param \DateTime $datedenaissance
     */
    public function setDatedenaissance(\DateTime $datedenaissance): void
    {
        $this->datedenaissance = $datedenaissance;
    }

    /**
     * @return string
     */
    public function getRoll(): string
    {
        return $this->roll;
    }

    /**
     * @param string $roll
     */
    public function setRoll(string $roll): void
    {
        $this->roll = $roll;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdclub(): \Doctrine\Common\Collections\Collection
    {
        return $this->idclub;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $idclub
     */
    public function setIdclub(\Doctrine\Common\Collections\Collection $idclub): void
    {
        $this->idclub = $idclub;
    }

}

