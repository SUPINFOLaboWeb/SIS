<?php

require_once('../protected/required.php');

class News {

    private $id;
    private $authorId;
    private $publicationDate;
    private $content;

    function __construct($authorId, $content, $id, $publicationDate)
    {
        $this->authorId         = $authorId;
        $this->content          = $content;
        $this->id               = $id;
        $this->publicationDate  = $publicationDate;
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