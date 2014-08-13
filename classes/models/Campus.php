<?php

require_once('protected/required.php');

class Campus {

    private $id;
    private $campusName;

    function __construct($id, $campusName)
    {
        $this->id = $id;
        $this->campusName = $campusName;
    }

    public function getJSON() {
        return json_encode(get_object_vars($this));
    }



    public function setCampusName($campusName)
    {
        $this->campusName = $campusName;
    }

    public function getCampusName()
    {
        return $this->campusName;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

}
?>