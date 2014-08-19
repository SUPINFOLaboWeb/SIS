<?php

require_once('../protected/required.php');

class MeetingUser {

    private $id;
    private $userId;
    private $meetingId;
    private $status;

    function __construct($id, $userId, $meetingId, $status)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->meetingId = $meetingId;
        $this->status = $status;
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

    public function setMeetingId($meetingId)
    {
        $this->meetingId = $meetingId;
    }

    public function getMeetingId()
    {
        return $this->meetingId;
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