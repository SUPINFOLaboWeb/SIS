<?php

require_once('../protected/required.php');

class ProjectUser {

    private $id;
    private $userId;
    private $projectId;
    private $status;

    function __construct($id, $userId, $projectId, $status)
    {
        $this->id           = $id;
        $this->userId       = $userId;
        $this->projectId    = $projectId;
        $this->status       = $status;
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

    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    public function getProjectId()
    {
        return $this->projectId;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

}
?>