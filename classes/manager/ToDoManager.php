<?php

require_once('../protected/required.php');

interface ToDoManager {

    function addToDo($to_do);
    function updateToDo($to_do);
    function getToDo($id);
    function getToDos();
    function removeToDo($to_do);

}

?>