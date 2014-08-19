<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoMeetingUserManager extends AbstractPdoManager implements MeetingUserManager {

    public function addMeetingUser($meetingUser) {

        $query = $this -> pdo -> prepare('INSERT INTO meeting_users (user_id, meeting_id, status) VALUES (:user_id, :meeting_id, :status)');
        $query -> bindValue(':user_id', $meetingUser -> getUserId());
        $query -> bindValue(':meeting_id', $meetingUser -> getMeetingId());
        $query -> bindValue(':status', $meetingUser -> getStatus());
        $query -> execute();

    }

    public function updateMeetingUser($meetingUser) {

        $query = $this -> pdo -> prepare('UPDATE meeting_users SET user_id = :user_id, meeting_id = :meeting_id, status = :status WHERE id = :id');
        $query -> bindValue(':user_id', $meetingUser -> getUserId());
        $query -> bindValue(':meeting_id', $meetingUser -> getMeetingId());
        $query -> bindValue(':status', $meetingUser -> getStatus());
        $query -> bindValue(':id', $meetingUser -> getId());
        $query -> execute();

    }

    public function getMeetingUser($id) {

        $query = $this -> pdo -> prepare('SELECT * FROM meeting_users WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $meetingUser = new MeetingUser($result['id'], $result['user_id'], $result['meeting_id'], $result['status']);

        $query -> closeCursor();

        return $meetingUser;
    }

    public function getMeetingUsers() {

        $query = $this -> pdo -> prepare('SELECT * FROM meeting_users');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $meetingUsers = array();
        foreach ($results as $result) {
            $meetingUsers[] = new MeetingUser($result['id'], $result['user_id'], $result['meeting_id'], $result['status']);
        }

        $query -> closeCursor();

        return $meetingUsers;
    }

    public function removeMeetingUser($meetingUser) {

        $query = $this -> pdo -> prepare('DELETE FROM meeting_users WHERE id = :id');
        $query -> bindValue('id', $meetingUser -> getId());
        $query -> execute();

    }




}

?>