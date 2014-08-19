<?php

require_once('../protected/required.php');

class NewsComment {

    private $id;
    private $newsId;
    private $authorId;
    private $publicationDate;
    private $content;

    function __construct($id, $newsId, $authorId, $publicationDate, $content)
    {
        $this->id = $id;
        $this->newsId = $newsId;
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

    public function setNewsId($newsId)
    {
        $this->newsId = $newsId;
    }

    public function getNewsId()
    {
        return $this->newsId;
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