<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note", indexes={@ORM\Index(name="idEmploye", columns={"idEmploye"})})
 * @ORM\Entity
 */
class Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idNote", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnote;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=25, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;

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
    public function getIdnote(): int
    {
        return $this->idnote;
    }

    /**
     * @param int $idnote
     */
    public function setIdnote(int $idnote): void
    {
        $this->idnote = $idnote;
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
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
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

