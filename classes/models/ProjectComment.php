<?php

require_once('../protected/required.php');

class ProjectComment {

    private $id;
    private $projectId;
    private $authorId;
    private $publicationDate;
    private $content;

    function __construct($id, $projectId, $authorId, $publicationDate, $content)
    {
        $this->id = $id;
        $this->projectId = $projectId;
        $this->authorId = $authorId;
        $this->publicationDate = $publicationDate;
        $this->content = $content;
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

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    public function getProjectId()
    {
        return $this->projectId;
    }

    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }

    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

}
?>