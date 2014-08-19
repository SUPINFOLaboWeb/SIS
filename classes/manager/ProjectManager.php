<?php

require_once('../protected/required.php');

interface ProjectManager {

    function addProject($project);
    function updateProject($project);
    function getProject($id);
    function getProjects();
    function removeProject($project);

}

?>