<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket", indexes={@ORM\Index(name="idVisiteur", columns={"idVisiteur"})})
 * @ORM\Entity
 */
class Ticket
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nbPlaces", type="integer", nullable=false)
     */
    private $nbplaces;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=false)
     */
    private $code;

    /**
     * @var \Visiteur
     *
     * @ORM\ManyToOne(targetEntity="Visiteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVisiteur", referencedColumnName="idVisiteur")
     * })
     */
    private $idvisiteur;

    /**
     * @var \Evenement
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEvenement", referencedColumnName="idEvenement")
     * })
     */
    private $idevenement;

    /**
     * @return int
     */
    public function getNbplaces(): int
    {
        return $this->nbplaces;
    }

    /**
     * @param int $nbplaces
     */
    public function setNbplaces(int $nbplaces): void
    {
        $this->nbplaces = $nbplaces;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return \Visiteur
     */
    public function getIdvisiteur(): \Visiteur
    {
        return $this->idvisiteur;
    }

    /**
     * @param \Visiteur $idvisiteur
     */
    public function setIdvisiteur(\Visiteur $idvisiteur): void
    {
        $this->idvisiteur = $idvisiteur;
    }

    /**
     * @return \Evenement
     */
    public function getIdevenement(): \Evenement
    {
        return $this->idevenement;
    }

    /**
     * @param \Evenement $idevenement
     */
    public function setIdevenement(\Evenement $idevenement): void
    {
        $this->idevenement = $idevenement;
    }


}

