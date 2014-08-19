<?php

require_once('../protected/required.php');

interface CampusManager {

    function addCampus($campus);
    function updateCampus($campus);
    function getCampus($id);
    function getCampuses();
    function removeCampus($campus);

}

?>