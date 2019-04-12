<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club", indexes={@ORM\Index(name="idPole", columns={"idPole"}), @ORM\Index(name="club_ibfk_1", columns={"idResponsableClub"})})
 * @ORM\Entity
 */
class Club
{
    /**
     * @var string
     *
     * @ORM\Column(name="idClub", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclub;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="blob", nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="cotisationAnnuelle", type="float", precision=10, scale=0, nullable=true)
     */
    private $cotisationannuelle;

    /**
     * @var \Pole
     *
     * @ORM\ManyToOne(targetEntity="Pole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPole", referencedColumnName="idPole")
     * })
     */
    private $idpole;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idResponsableClub", referencedColumnName="idUtilisateur")
     * })
     */
    private $idresponsableclub;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="idclub")
     */
    private $idmembreclub;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idmembreclub = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
    public function getIdclub(): string
    {
        return $this->idclub;
    }

    /**
     * @param string $idclub
     */
    public function setIdclub(string $idclub): void
    {
        $this->idclub = $idclub;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
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
    public function getCotisationannuelle(): float
    {
        return $this->cotisationannuelle;
    }

    /**
     * @param float $cotisationannuelle
     */
    public function setCotisationannuelle(float $cotisationannuelle): void
    {
        $this->cotisationannuelle = $cotisationannuelle;
    }

    /**
     * @return \Pole
     */
    public function getIdpole(): \Pole
    {
        return $this->idpole;
    }

    /**
     * @param \Pole $idpole
     */
    public function setIdpole(\Pole $idpole): void
    {
        $this->idpole = $idpole;
    }

    /**
     * @return \Utilisateur
     */
    public function getIdresponsableclub(): \Utilisateur
    {
        return $this->idresponsableclub;
    }

    /**
     * @param \Utilisateur $idresponsableclub
     */
    public function setIdresponsableclub(\Utilisateur $idresponsableclub): void
    {
        $this->idresponsableclub = $idresponsableclub;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdmembreclub(): \Doctrine\Common\Collections\Collection
    {
        return $this->idmembreclub;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $idmembreclub
     */
    public function setIdmembreclub(\Doctrine\Common\Collections\Collection $idmembreclub): void
    {
        $this->idmembreclub = $idmembreclub;
    }

}

