<?php

require_once('../protected/required.php');

interface NewsManager {

    function addNew($new);
    function updateNew($new);
    function getNew($id);
    function getNews();
    function removeNew($new);

}

?>