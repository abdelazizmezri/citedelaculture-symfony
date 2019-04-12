<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visiteur
 *
 * @ORM\Table(name="visiteur")
 * @ORM\Entity
 */
class Visiteur
{
    /**
     * @var string
     *
     * @ORM\Column(name="idVisiteur", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvisiteur;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Evenement", mappedBy="idvisiteur")
     */
    private $idevenement;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Espace", inversedBy="idclient")
     * @ORM\JoinTable(name="reservationespace",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idClient", referencedColumnName="idVisiteur")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idEspace", referencedColumnName="idEspace")
     *   }
     * )
     */
    private $idespace;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idevenement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idespace = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
    public function getIdvisiteur(): string
    {
        return $this->idvisiteur;
    }

    /**
     * @param string $idvisiteur
     */
    public function setIdvisiteur(string $idvisiteur): void
    {
        $this->idvisiteur = $idvisiteur;
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
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdevenement(): \Doctrine\Common\Collections\Collection
    {
        return $this->idevenement;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $idevenement
     */
    public function setIdevenement(\Doctrine\Common\Collections\Collection $idevenement): void
    {
        $this->idevenement = $idevenement;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdespace(): \Doctrine\Common\Collections\Collection
    {
        return $this->idespace;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $idespace
     */
    public function setIdespace(\Doctrine\Common\Collections\Collection $idespace): void
    {
        $this->idespace = $idespace;
    }

}

