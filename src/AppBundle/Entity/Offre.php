<?php

namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OffreRepository")
 * @Vich\Uploadable
 */
class Offre
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Evenement", cascade={"persist"})
     * @ORM\JoinColumn(name="id_evenement",referencedColumnName="idEvenement")
     */
    private $evenement;


    /**
     * @var float
     *
     * @ORM\Column(name="remise", type="float")
     */
    private $remise;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean" )
     */
    private $status;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_debut", type="float")
     */
    private $prixDebut;
    /**
     * @var float
     *
     * @ORM\Column(name="prix_final", type="float")
     */
    private $prixFinal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut" ,type="date",nullable=true)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date",nullable=true)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="likesnumber", type="float")
     */
    private $likesnumber;

    /**
     * @var float
     *
     * @ORM\Column(name="dislikesnumber", type="float")
     */
    private $dislikesnumber;
    /**
     * Offre constructor.
     * @param bool $status
     */
    public function __construct()
    {
        $this->status = false ;
        $this->likesnumber = 0 ;
        $this->dislikesnumber = 0 ;
    }

    /**
     * @return mixed
     */
    public function getLikesnumber()
    {
        return $this->likesnumber;
    }

    /**
     * @param mixed $likesnumber
     */
    public function setLikesnumber($likesnumber): void
    {
        $this->likesnumber = $likesnumber;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set remise
     *
     * @param float $remise
     *
     * @return Offre
     */
    public function setRemise($remise)
    {
        $this->remise = $remise;

        return $this;
    }

    /**
     * Get remise
     *
     * @return float
     */
    public function getRemise()
    {
        return $this->remise;
    }

    /**
     * Set prixFinal
     *
     * @param float $prixFinal
     *
     * @return Offre
     */
    public function setPrixFinal($prixFinal)
    {
        $this->prixFinal = $prixFinal;

        return $this;
    }

    /**
     * Get prixFinal
     *
     * @return float
     */
    public function getPrixFinal()
    {
        return $this->prixFinal;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Offre
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Offre
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Offre
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getEvenement()
    {
        return $this->evenement;
    }

    /**
     * @param mixed $evenement
     */
    public function setEvenement($evenement): void
    {
        $this->evenement = $evenement;
    }




    /**
     * @return float
     */
    public function getPrixDebut()
    {
        return $this->prixDebut;
    }

    /**
     * @param float $prixDebut
     */
    public function setPrixDebut($prixDebut)
    {
        $this->prixDebut = $prixDebut;
    }

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    // ...

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getJson()
    {
        return json_encode($this->getId());
    }
    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDislikesnumber()
    {
        return $this->dislikesnumber;
    }

    /**
     * @param mixed $dislikesnumber
     */
    public function setDislikesnumber($dislikesnumber): void
    {
        $this->dislikesnumber = $dislikesnumber;
    }







}

