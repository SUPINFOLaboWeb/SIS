<?php

require_once('../protected/required.php');

interface UserManager {

    function addUser($user);
    function updateUser($user);
    function getUser($id);
    function getUsers();
    function removeUser($user);

}

?>