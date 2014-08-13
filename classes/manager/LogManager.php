<?php

require_once('protected/required.php');

interface LogManager {

    function addLog($log);
    function updateLog($log);
    function getLog($id);
    function getLogs();
    function removeLog($log);

}

?>