<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Espace
 *
 * @ORM\Table(name="espace")
 * @ORM\Entity
 */
class Espace
{
    /**
     * @var string
     *
     * @ORM\Column(name="idEspace", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idespace;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacite", type="integer", nullable=true)
     */
    private $capacite;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="prixDeLocation", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixdelocation;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Visiteur", mappedBy="idespace")
     */
    private $idclient;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idclient = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
    public function getIdespace(): string
    {
        return $this->idespace;
    }

    /**
     * @param string $idespace
     */
    public function setIdespace(string $idespace): void
    {
        $this->idespace = $idespace;
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
     * @return int
     */
    public function getCapacite(): int
    {
        return $this->capacite;
    }

    /**
     * @param int $capacite
     */
    public function setCapacite(int $capacite): void
    {
        $this->capacite = $capacite;
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
     * @return float
     */
    public function getPrixdelocation(): float
    {
        return $this->prixdelocation;
    }

    /**
     * @param float $prixdelocation
     */
    public function setPrixdelocation(float $prixdelocation): void
    {
        $this->prixdelocation = $prixdelocation;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdclient(): \Doctrine\Common\Collections\Collection
    {
        return $this->idclient;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $idclient
     */
    public function setIdclient(\Doctrine\Common\Collections\Collection $idclient): void
    {
        $this->idclient = $idclient;
    }

}

