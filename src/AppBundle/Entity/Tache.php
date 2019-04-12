<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tache
 *
 * @ORM\Table(name="tache", indexes={@ORM\Index(name="idEmploye", columns={"idEmploye"})})
 * @ORM\Entity
 */
class Tache
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTache", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtache;

    /**
     * @var boolean
     *
     * @ORM\Column(name="termine", type="boolean", nullable=false)
     */
    private $termine;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="string", length=150, nullable=false)
     */
    private $texte;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEmploye", referencedColumnName="idUtilisateur")
     * })
     */
    private $idemploye;

    /**
     * @return int
     */
    public function getIdtache(): int
    {
        return $this->idtache;
    }

    /**
     * @param int $idtache
     */
    public function setIdtache(int $idtache): void
    {
        $this->idtache = $idtache;
    }

    /**
     * @return bool
     */
    public function isTermine(): bool
    {
        return $this->termine;
    }

    /**
     * @param bool $termine
     */
    public function setTermine(bool $termine): void
    {
        $this->termine = $termine;
    }

    /**
     * @return string
     */
    public function getTexte(): string
    {
        return $this->texte;
    }

    /**
     * @param string $texte
     */
    public function setTexte(string $texte): void
    {
        $this->texte = $texte;
    }

    /**
     * @return \Utilisateur
     */
    public function getIdemploye(): \Utilisateur
    {
        return $this->idemploye;
    }

    /**
     * @param \Utilisateur $idemploye
     */
    public function setIdemploye(\Utilisateur $idemploye): void
    {
        $this->idemploye = $idemploye;
    }


}

