<?php
/**
 * Created by PhpStorm.
 * User: revecom
 * Date: 13/02/2019
 * Time: 23:15
 */

namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */


class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer",nullable=true)
     */
    protected $tel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="subscribe", type="boolean" )
     */
    protected $subscribe;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ban", type="boolean" )
     */
    protected $ban;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->subscribe = false ;
        $this->ban = false ;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param int $tel
     */
    public function setTel( $tel)
    {
        $this->tel = $tel;
    }



    /**
     * @return bool
     */
    public function isSubscribe()
    {
        return $this->subscribe;
    }

    /**
     * @param bool $subscribe
     */
    public function setSubscribe( $subscribe)
    {
        $this->subscribe = $subscribe;
    }

    /**
     * @return bool
     */
    public function isBan()
    {
        return $this->ban;
    }

    /**
     * @param bool $ban
     */
    public function setBan( $ban)
    {
        $this->ban = $ban;
    }


}