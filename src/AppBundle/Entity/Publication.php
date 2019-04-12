<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication", indexes={@ORM\Index(name="idRedacteur", columns={"idRedacteur"})})
 * @ORM\Entity
 */
class Publication
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPublication", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpublication;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255, nullable=false)
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier", type="blob", nullable=true)
     */
    private $fichier;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRedacteur", referencedColumnName="idUtilisateur")
     * })
     */
    private $idredacteur;

    /**
     * @return int
     */
    public function getIdpublication(): int
    {
        return $this->idpublication;
    }

    /**
     * @param int $idpublication
     */
    public function setIdpublication(int $idpublication): void
    {
        $this->idpublication = $idpublication;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getContenu(): string
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
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
    public function getFichier(): string
    {
        return $this->fichier;
    }

    /**
     * @param string $fichier
     */
    public function setFichier(string $fichier): void
    {
        $this->fichier = $fichier;
    }

    /**
     * @return \Utilisateur
     */
    public function getIdredacteur(): \Utilisateur
    {
        return $this->idredacteur;
    }

    /**
     * @param \Utilisateur $idredacteur
     */
    public function setIdredacteur(\Utilisateur $idredacteur): void
    {
        $this->idredacteur = $idredacteur;
    }


}

