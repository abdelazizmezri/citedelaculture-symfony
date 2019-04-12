<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var string
     *
     * @ORM\Column(name="idEvenement", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevenement;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var boolean
     *
     * @ORM\Column(name="confirme", type="boolean", nullable=true)
     */
    private $confirme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps", type="time", nullable=false)
     */
    private $temps;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbMaxPlaces", type="integer", nullable=true)
     */
    private $nbmaxplaces;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbMinPlaces", type="integer", nullable=false)
     */
    private $nbminplaces;





    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Visiteur", inversedBy="idevenement")
     * @ORM\JoinTable(name="eventVisiteur",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idEvenement", referencedColumnName="idEvenement")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idVisiteur", referencedColumnName="idVisiteur")
     *   }
     * )
     */
    private $idvisiteur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idvisiteur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
    public function getIdevenement(): string
    {
        return $this->idevenement;
    }

    /**
     * @param string $idevenement
     */
    public function setIdevenement(string $idevenement): void
    {
        $this->idevenement = $idevenement;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrix(): float
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    /**
     * @return bool
     */
    public function isConfirme(): bool
    {
        return $this->confirme;
    }

    /**
     * @param bool $confirme
     */
    public function setConfirme(bool $confirme): void
    {
        $this->confirme = $confirme;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return \DateTime
     */
    public function getTemps(): \DateTime
    {
        return $this->temps;
    }

    /**
     * @param \DateTime $temps
     */
    public function setTemps(\DateTime $temps): void
    {
        $this->temps = $temps;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getNbmaxplaces(): int
    {
        return $this->nbmaxplaces;
    }

    /**
     * @param int $nbmaxplaces
     */
    public function setNbmaxplaces(int $nbmaxplaces): void
    {
        $this->nbmaxplaces = $nbmaxplaces;
    }

    /**
     * @return int
     */
    public function getNbminplaces(): int
    {
        return $this->nbminplaces;
    }

    /**
     * @param int $nbminplaces
     */
    public function setNbminplaces(int $nbminplaces): void
    {
        $this->nbminplaces = $nbminplaces;
    }






    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdvisiteur(): \Doctrine\Common\Collections\Collection
    {
        return $this->idvisiteur;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $idvisiteur
     */
    public function setIdvisiteur(\Doctrine\Common\Collections\Collection $idvisiteur): void
    {
        $this->idvisiteur = $idvisiteur;
    }

}

