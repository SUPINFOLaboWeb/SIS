<?php

require_once('../protected/required.php');

interface ItemManager {

    function addItem($item);
    function updateItem($item);
    function getItem($id);
    function getItems();
    function removeItem($item);

}

?>