<?php

require_once('../protected/required.php');

class File {

    private $id;
    private $creatorId;
    private $parentId;
    private $projectId;
    private $name;
    private $archive;
    private $content;
    private $creationDate;
    private $isDirectory;

    public function __construct($id = null, $creatorId = null, $parentId = null, $projectId = null, $name = null, $archive = null, $content = null, $creationDate = null, $isDirectory = null) {

        $this->id           = $id;
        $this->creatorId    = $creatorId;
        $this->parentId     = $parentId;
        $this->projectId    = $projectId;
        $this->name         = $name;
        $this->archive      = $archive;
        $this->content      = $content;
        $this->creationDate = $creationDate;
        $this->isDirectory  = $isDirectory;

    }

    public function getJSON() {
        return json_encode(get_object_vars($this));
    }



    public function setArchive($archive)
    {
        $this->archive = $archive;
    }

    public function getArchive()
    {
        return $this->archive;
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

    public function setCreatorId($creatorId)
    {
        $this->creatorId = $creatorId;
    }

    public function getCreatorId()
    {
        return $this->creatorId;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setIsDirectory($isDirectory)
    {
        $this->isDirectory = $isDirectory;
    }

    public function getIsDirectory()
    {
        return $this->isDirectory;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    public function getParentId()
    {
        return $this->parentId;
    }

    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    public function getProjectId()
    {
        return $this->projectId;
    }

}
?>