<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity()
 */
class Rating
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Offre")
     * @ORM\JoinColumn(name="offre",referencedColumnName="id",onDelete="CASCADE")
     */
    private $offre;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user",referencedColumnName="id")
     */
    private $user;

    /**
     * @var boolean
     *
     * @ORM\Column(name="likes", type="boolean" )
     */
    private $likes;

    /**
     * Rating constructor.
     * @param int $id
     */
    public function __construct()
    {
        $this->like = false ;
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
     * @return mixed
     */
    public function getOffre()
    {
        return $this->offre;
    }

    /**
     * @param mixed $offre
     */
    public function setOffre($offre)
    {
        $this->offre = $offre;
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return bool
     */
    public function isLikes()
    {
        return $this->likes;
    }

    /**
     * @param bool $like
     */
    public function setLikes( $likes)
    {
        $this->likes = $likes;
    }


}

