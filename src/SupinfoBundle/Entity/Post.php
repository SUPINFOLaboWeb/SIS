<?php

namespace SupinfoBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\UserAccount;

/**
 * Post
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SupinfoBundle\Entity\PostRepository")
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var bool
     *
     * @ORM\Column(name="flash", type="boolean")
     */
    private $flash = false;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime",nullable=true)
     */
    private $createdAt;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="modifiedAt", type="datetime" , nullable=true)
     */
    private $modifiedAt;

    /**
     * @var UserAccount
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\UserAccount")
     * @ORM\JoinColumn()
     */
    private $createdBy;

    /**
     * @var UserAccount
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\UserAccount")
     * @ORM\JoinColumn(nullable=true)
     */
    private $modifiedBy;

    /**
     * @var UserAccount
     * @ORM\ManyToOne(targetEntity="SupinfoBundle\Entity\Campus")
     * @ORM\JoinColumn(nullable=true)
     */
    private $campus;


    public function __construct(){
        $this->createdAt = new DateTime();
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
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param DateTime $createdAt
     * @return Post
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set modifiedAt
     *
     * @param DateTime $modifiedAt
     * @return Post
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * @return UserAccount
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param UserAccount $createdBy
     * @return $this
     */
    public function setCreatedBy(UserAccount $createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * @return UserAccount
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * @param UserAccount $modifiedBy
     * @return $this
     */
    public function setModifiedBy(UserAccount $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }

    /**
     * @return UserAccount
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
     * @return boolean
     */
    public function isFlash()
    {
        return $this->flash;
    }

    /**
     * @param boolean $flash
     * @return $this
     */
    public function setFlash($flash)
    {
        $this->flash = $flash;

        return $this;
    }
}
