<?php

require_once('protected/required.php');

interface MeetingManager {

    function addMeeting($meeting);
    function updateMeeting($meeting);
    function getMeeting($id);
    function getMeetings();
    function removeMeeting($meeting);

}

?>