<?php

require_once('../protected/required.php');

interface RentManager {

    function addRent($rent);
    function updateRent($rent);
    function getRent($id);
    function getRents();
    function removeRent($rent);

}

?>