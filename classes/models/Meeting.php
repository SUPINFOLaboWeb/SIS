<?php

require_once('../protected/required.php');

class Meeting {

    private $id;
    private $creatorId;
    private $projectId;
    private $date;
    private $duration;
    private $subject;
    private $description;
    private $summary;
    private $archive;

    function __construct($id, $creatorId, $projectId, $date, $duration, $subject, $description, $summary, $archive)
    {
        $this->id           = $id;
        $this->creatorId    = $creatorId;
        $this->projectId    = $projectId;
        $this->date         = $date;
        $this->duration     = $duration;
        $this->subject      = $subject;
        $this->description  = $description;
        $this->summary      = $summary;
        $this->archive      = $archive;
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

    public function setCreatorId($creatorId)
    {
        $this->creatorId = $creatorId;
    }

    public function getCreatorId()
    {
        return $this->creatorId;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    public function getDuration()
    {
        return $this->duration;
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

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    public function getSummary()
    {
        return $this->summary;
    }

}
?>