<?php

require_once('../protected/required.php');

interface ProjectUserManager {

    function addProjectUser($projectUser);
    function updateProjectUser($projectUser);
    function getProjectUser($id);
    function getProjectUsers();
    function removeProjectUser($projectUser);

}

?>