<?php

require_once('../protected/required.php');

interface FileManager {

    function addFile($file);
    function updateFile($file);
    function getFile($id);
    function getFiles();
    function removeFile($file);

}

?>