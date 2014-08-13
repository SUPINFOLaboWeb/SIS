<?php

require_once('protected/required.php');

class Project {

    private $id;
    private $campusId;
    private $creatorId;
    private $projectId;
    private $name;
    private $creationDate;
    private $deadlineDate;
    private $progress;
    private $description;
    private $technologies;

    function __construct($id, $campusId, $creatorId, $projectId, $name, $creationDate, $deadlineDate, $progress, $description, $technologies)
    {
        $this->id = $id;
        $this->campusId = $campusId;
        $this->creatorId = $creatorId;
        $this->projectId = $projectId;
        $this->name = $name;
        $this->creationDate = $creationDate;
        $this->deadlineDate = $deadlineDate;
        $this->progress = $progress;
        $this->description = $description;
        $this->technologies = $technologies;
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

    public function setDeadlineDate($deadlineDate)
    {
        $this->deadlineDate = $deadlineDate;
    }

    public function getDeadlineDate()
    {
        return $this->deadlineDate;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setProgress($progress)
    {
        $this->progress = $progress;
    }

    public function getProgress()
    {
        return $this->progress;
    }

    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    public function getProjectId()
    {
        return $this->projectId;
    }

    public function setTechnologies($technologies)
    {
        $this->technologies = $technologies;
    }

    public function getTechnologies()
    {
        return $this->technologies;
    }

}
?>