<?php

require_once('../protected/required.php');

class User {

    private $idBooster;
    private $campusId;
    private $privilegeId;
    private $lastname;
    private $firstname;
    private $password;

    function __construct($idBooster, $campusId, $privilegeId, $lastname, $firstname, $password)
    {
        $this->idBooster = $idBooster;
        $this->campusId = $campusId;
        $this->privilegeId = $privilegeId;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->password = $password;
    }


    public function getJSON() {
        return json_encode(get_object_vars($this));
    }



    public function setCampusId($campusId)
    {
        $this->campusId = $campusId;
    }

    public function getCampusId()
    {
        return $this->campusId;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setIdBooster($idBooster)
    {
        $this->idBooster = $idBooster;
    }

    public function getIdBooster()
    {
        return $this->idBooster;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPrivilegeId($privilegeId)
    {
        $this->privilegeId = $privilegeId;
    }

    public function getPrivilegeId()
    {
        return $this->privilegeId;
    }

}
?>