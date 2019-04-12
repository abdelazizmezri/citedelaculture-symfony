<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notification", indexes={@ORM\Index(name="idDestinataire", columns={"idDestinataire"})})
 * @ORM\Entity
 */
class Notification
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idNotification", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnotification;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=false)
     */
    private $message;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vu", type="boolean", nullable=true)
     */
    private $vu;

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
     * @return int
     */
    public function getIdnotification(): int
    {
        return $this->idnotification;
    }

    /**
     * @param int $idnotification
     */
    public function setIdnotification(int $idnotification): void
    {
        $this->idnotification = $idnotification;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return bool
     */
    public function isVu(): bool
    {
        return $this->vu;
    }

    /**
     * @param bool $vu
     */
    public function setVu(bool $vu): void
    {
        $this->vu = $vu;
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


}

