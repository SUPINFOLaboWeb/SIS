<?php

require_once('../protected/required.php');

interface NewsCommentManager {

    function addNewsComment($newsComment);
    function updateNewsComment($newsComment);
    function getNewsComment($id);
    function getNewsCommentsByNews($newsId);
    function getNewsComments();
    function removeNewsComment($newsComment);

}

?>