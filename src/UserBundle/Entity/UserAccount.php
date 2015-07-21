<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use SupinfoBundle\Entity\Campus;

/**
 * UserAccount
 *
 * @ORM\Entity
 * @ORM\Table(name="user_account")
 * @ORM\Entity(repositoryClass="UserBundle\Entity\UserAccountRepository")
 */
class UserAccount extends BaseUser implements \JsonSerializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=50)
     */
    protected $firstname;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=50)
     */
    protected $lastname;

    /**
     * @ORM\ManyToOne(targetEntity="SupinfoBundle\Entity\Campus")
     * @ORM\JoinColumn()
     */
    protected $campus;

    /**
     * @ORM\ManyToMany(targetEntity="UserGroup")
     * @ORM\JoinTable(name="user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return UserAccount
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return UserAccount
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get User Campus
     * @return Campus|null
     */
    public function getCampus()
    {
        return $this->campus;
    }

    /**
     * @param Campus $campus
     * @return $this
     */
    public function setCampus(Campus $campus)
    {
        $this->campus = $campus;
        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    function jsonSerialize()
    {
        return array(
            "id" => $this->id,
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "username" => $this->username,
            "roles" => $this->getRoles(),
            "campus" => $this->getCampus()->getName(),
            "email" => $this->getEmail(),
        );
    }
}
