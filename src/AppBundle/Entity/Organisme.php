<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organisme
 *
 * @ORM\Table(name="organisme", indexes={@ORM\Index(name="idResponsableOrganisme", columns={"idResponsableOrganisme"}), @ORM\Index(name="organisme_ibfk_5", columns={"idPole"})})
 * @ORM\Entity
 */
class Organisme
{
    /**
     * @var string
     *
     * @ORM\Column(name="idOrganisme", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idorganisme;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="blob", nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idResponsableOrganisme", referencedColumnName="idUtilisateur")
     * })
     */
    private $idresponsableorganisme;

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
     * @return string
     */
    public function getIdorganisme(): string
    {
        return $this->idorganisme;
    }

    /**
     * @param string $idorganisme
     */
    public function setIdorganisme(string $idorganisme): void
    {
        $this->idorganisme = $idorganisme;
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
     * @return \Utilisateur
     */
    public function getIdresponsableorganisme(): \Utilisateur
    {
        return $this->idresponsableorganisme;
    }

    /**
     * @param \Utilisateur $idresponsableorganisme
     */
    public function setIdresponsableorganisme(\Utilisateur $idresponsableorganisme): void
    {
        $this->idresponsableorganisme = $idresponsableorganisme;
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


}

