<?php

require_once('protected/required.php');

class Privilege {

    private $id;
    private $privilegeName;

    function __construct($id, $privilegeName)
    {
        $this->id = $id;
        $this->privilegeName = $privilegeName;
    }


    public function getJSON() {
        return json_encode(get_object_vars($this));
    }



    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPrivilegeName($privilegeName)
    {
        $this->privilegeName = $privilegeName;
    }

    public function getPrivilegeName()
    {
        return $this->privilegeName;
    }

}
?>