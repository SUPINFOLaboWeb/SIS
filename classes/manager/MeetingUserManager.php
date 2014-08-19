<?php

require_once('../protected/required.php');

interface MeetingUserManager {

    function addMeetingUser($meetingUser);
    function updateMeetingUser($meetingUser);
    function getMeetingUser($id);
    function getMeetingUsers();
    function removeMeetingUser($meetingUser);

}

?>