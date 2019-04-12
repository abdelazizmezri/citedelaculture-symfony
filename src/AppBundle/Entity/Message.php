<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message", indexes={@ORM\Index(name="idDestinataire", columns={"idDestinataire"}), @ORM\Index(name="idEmetteur", columns={"idUtilisateurEmetteur"}), @ORM\Index(name="idVisiteur", columns={"idVisiteurEmetteur"})})
 * @ORM\Entity
 */
class Message
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idMessage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmessage;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lu", type="boolean", nullable=false)
     */
    private $lu;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=255, nullable=false)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255, nullable=false)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMessage", type="date", nullable=false)
     */
    private $datemessage;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDestinataire", referencedColumnName="idUtilisateur")
     * })
     */
    private $iddestinataire;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUtilisateurEmetteur", referencedColumnName="idUtilisateur")
     * })
     */
    private $idutilisateuremetteur;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVisiteurEmetteur", referencedColumnName="idUtilisateur")
     * })
     */
    private $idvisiteuremetteur;

    /**
     * @return int
     */
    public function getIdmessage(): int
    {
        return $this->idmessage;
    }

    /**
     * @param int $idmessage
     */
    public function setIdmessage(int $idmessage): void
    {
        $this->idmessage = $idmessage;
    }

    /**
     * @return bool
     */
    public function isLu(): bool
    {
        return $this->lu;
    }

    /**
     * @param bool $lu
     */
    public function setLu(bool $lu): void
    {
        $this->lu = $lu;
    }

    /**
     * @return string
     */
    public function getObjet(): string
    {
        return $this->objet;
    }

    /**
     * @param string $objet
     */
    public function setObjet(string $objet): void
    {
        $this->objet = $objet;
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
     * @return \DateTime
     */
    public function getDatemessage(): \DateTime
    {
        return $this->datemessage;
    }

    /**
     * @param \DateTime $datemessage
     */
    public function setDatemessage(\DateTime $datemessage): void
    {
        $this->datemessage = $datemessage;
    }

    /**
     * @return \Utilisateur
     */
    public function getIddestinataire(): \Utilisateur
    {
        return $this->iddestinataire;
    }

    /**
     * @param \Utilisateur $iddestinataire
     */
    public function setIddestinataire(\Utilisateur $iddestinataire): void
    {
        $this->iddestinataire = $iddestinataire;
    }

    /**
     * @return \Utilisateur
     */
    public function getIdutilisateuremetteur(): \Utilisateur
    {
        return $this->idutilisateuremetteur;
    }

    /**
     * @param \Utilisateur $idutilisateuremetteur
     */
    public function setIdutilisateuremetteur(\Utilisateur $idutilisateuremetteur): void
    {
        $this->idutilisateuremetteur = $idutilisateuremetteur;
    }

    /**
     * @return \Utilisateur
     */
    public function getIdvisiteuremetteur(): \Utilisateur
    {
        return $this->idvisiteuremetteur;
    }

    /**
     * @param \Utilisateur $idvisiteuremetteur
     */
    public function setIdvisiteuremetteur(\Utilisateur $idvisiteuremetteur): void
    {
        $this->idvisiteuremetteur = $idvisiteuremetteur;
    }


}

