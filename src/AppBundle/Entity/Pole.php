<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pole
 *
 * @ORM\Table(name="pole", indexes={@ORM\Index(name="idResponsablePole", columns={"idResponsablePole"})})
 * @ORM\Entity
 */
class Pole
{
    /**
     * @var string
     *
     * @ORM\Column(name="idPole", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpole;

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
     *   @ORM\JoinColumn(name="idResponsablePole", referencedColumnName="idUtilisateur")
     * })
     */
    private $idresponsablepole;

    /**
     * @return string
     */
    public function getIdpole(): string
    {
        return $this->idpole;
    }

    /**
     * @param string $idpole
     */
    public function setIdpole(string $idpole): void
    {
        $this->idpole = $idpole;
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
    public function getIdresponsablepole(): \Utilisateur
    {
        return $this->idresponsablepole;
    }

    /**
     * @param \Utilisateur $idresponsablepole
     */
    public function setIdresponsablepole(\Utilisateur $idresponsablepole): void
    {
        $this->idresponsablepole = $idresponsablepole;
    }


}

