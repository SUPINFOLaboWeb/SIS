<?php

require_once('../protected/required.php');

interface ProjectCommentManager {

    function addProjectComment($projectComment);
    function updateProjectComment($projectComment);
    function getProjectComment($id);
    function getProjectComments();
    function removeProjectComment($projectComment);

}

?>