<?php

require_once('../protected/required.php');

interface PrivilegeManager {

    function addPrivilege($privilege);
    function updatePrivilege($privilege);
    function getPrivilege($id);
    function getPrivileges();
    function removePrivilege($privilege);

}

?>