<?php

require_once('../protected/required.php');

class Log {

    private $id;
    private $campusId;
    private $authorId;
    private $creationDate;
    private $content;

    function __construct($id, $campusId, $authorId, $creationDate, $content)
    {
        $this->id           = $id;
        $this->campusId     = $campusId;
        $this->authorId     = $authorId;
        $this->creationDate = $creationDate;
        $this->content      = $content;
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

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
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