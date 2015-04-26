<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * UserAccount
 *
 * @ORM\Entity
 * @ORM\Table(name="user_account")
 * @ORM\Entity(repositoryClass="UserBundle\Entity\UserAccountRepository")
 */
class UserAccount extends BaseUser
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
     * @var integer
     * 
     * @ORM\Column(type="integer")
     */
    protected $campus_booster_id;

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
     * @ORM\OneToMany(targetEntity="Campus", mappedBy="user")
     */
    //protected $campus;

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
        // your own logic
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
     * Set campus_booster_id
     *
     * @param integer $campusBoosterId
     * @return UserAccount
     */
    public function setCampusBoosterId($campusBoosterId)
    {
        $this->campus_booster_id = $campusBoosterId;

        return $this;
    }

    /**
     * Get campus_booster_id
     *
     * @return integer 
     */
    public function getCampusBoosterId()
    {
        return $this->campus_booster_id;
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
}
