<?php

require_once('../protected/required.php');

class Item {

    private $id;
    private $campusId;
    private $type;
    private $vendor;
    private $model;
    private $sn;
    private $status;
    private $comment;

    function __construct($id, $campusId, $type, $vendor, $model, $sn, $status, $comment)
    {
        $this->id       = $id;
        $this->campusId = $campusId;
        $this->type     = $type;
        $this->vendor   = $vendor;
        $this->model    = $model;
        $this->sn       = $sn;
        $this->status   = $status;
        $this->comment  = $comment;
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

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setSn($sn)
    {
        $this->sn = $sn;
    }

    public function getSn()
    {
        return $this->sn;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
    }

    public function getVendor()
    {
        return $this->vendor;
    }

}
?>