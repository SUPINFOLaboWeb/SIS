<?php

require_once('../protected/required.php');

class Rent {

    private $id;
    private $campusId;
    private $authorId;
    private $itemId;
    private $idBooster;
    private $lastname;
    private $firstname;
    private $creationDate;
    private $endDate;
    private $is_return;

    function __construct($id, $campusId, $authorId, $itemId, $idBooster, $lastname, $firstname, $creationDate, $endDate, $is_return)
    {
        $this->itemId       = $itemId;
        $this->id           = $id;
        $this->campusId     = $campusId;
        $this->authorId     = $authorId;
        $this->idBooster    = $idBooster;
        $this->lastname     = $lastname;
        $this->firstname    = $firstname;
        $this->creationDate = $creationDate;
        $this->endDate      = $endDate;
        $this->is_return    = $is_return;
    }


    public function getJSON() {
        return json_encode(get_object_vars($this));
    }



    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function setCampusId($campusId)
    {
        $this->campusId = $campusId;
    }

    public function getCampusId()
    {
        return $this->campusId;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setIdBooster($idBooster)
    {
        $this->idBooster = $idBooster;
    }

    public function getIdBooster()
    {
        return $this->idBooster;
    }

    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }

    public function getItemId()
    {
        return $this->itemId;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setIsReturn($is_return)
    {
        $this->is_return = $is_return;
    }

    public function getIsReturn()
    {
        return $this->is_return;
    }

}
?>