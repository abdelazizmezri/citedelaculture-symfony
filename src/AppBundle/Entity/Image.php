<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image", uniqueConstraints={@ORM\UniqueConstraint(name="titre", columns={"titre"})}, indexes={@ORM\Index(name="idEspace", columns={"idEspace"}), @ORM\Index(name="idEvenement", columns={"idEvenement"})})
 * @ORM\Entity
 */
class Image
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idImage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idimage;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", nullable=false)
     */
    private $image;

    /**
     * @var \Espace
     *
     * @ORM\ManyToOne(targetEntity="Espace")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEspace", referencedColumnName="idEspace")
     * })
     */
    private $idespace;

    /**
     * @var \Evenement
     *
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEvenement", referencedColumnName="idEvenement")
     * })
     */
    private $idevenement;

    /**
     * @return int
     */
    public function getIdimage(): int
    {
        return $this->idimage;
    }

    /**
     * @param int $idimage
     */
    public function setIdimage(int $idimage): void
    {
        $this->idimage = $idimage;
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
     * @return \Espace
     */
    public function getIdespace(): \Espace
    {
        return $this->idespace;
    }

    /**
     * @param \Espace $idespace
     */
    public function setIdespace(\Espace $idespace): void
    {
        $this->idespace = $idespace;
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

