<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoMeetingManager extends AbstractPdoManager implements MeetingManager {

    public function addMeeting($meeting) {

        $query = $this -> pdo -> prepare('INSERT INTO meetings (creator_id, project_id, date, duration, subject, description, summary, archive) VALUES (:creator_id, :project_id, :date, :duration, :subject, :description, :summary, :archive)');
        $query -> bindValue(':creator_id', $meeting -> getCreatorId());
        $query -> bindValue(':project_id', $meeting -> getProjectId());
        $query -> bindValue(':date', $meeting -> getDate());
        $query -> bindValue(':duration', $meeting -> getDuration());
        $query -> bindValue(':subject', $meeting -> getSubject());
        $query -> bindValue(':description', $meeting -> getDescription());
        $query -> bindValue(':summary', $meeting -> getSummary());
        $query -> bindValue(':archive', $meeting -> getArchive());
        $query -> execute();

    }

    public function updateMeeting($meeting) {

        $query = $this -> pdo -> prepare('UPDATE meetings SET creator_id = :creator_id, project_id = :project_id, date = :date, duration = :duration, subject = :subject, description = :description, summary = :summary, archive = :archive WHERE id = :id');
        $query -> bindValue(':creator_id', $meeting -> getCreatorId());
        $query -> bindValue(':project_id', $meeting -> getProjectId());
        $query -> bindValue(':date', $meeting -> getDate());
        $query -> bindValue(':duration', $meeting -> getDuration());
        $query -> bindValue(':subject', $meeting -> getSubject());
        $query -> bindValue(':description', $meeting -> getDescription());
        $query -> bindValue(':summary', $meeting -> getSummary());
        $query -> bindValue(':archive', $meeting -> getArchive());
        $query -> bindValue(':id', $meeting -> getId());
        $query -> execute();

    }

    public function getMeeting($id) {

        $query = $this -> pdo -> prepare('SELECT * FROM meetings WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $meeting = new Meeting($result['id'], $result['creator_id'], $result['project_id'], $result['date'], $result['duration'], $result['subject'], $result['description'], $result['summary'], $result['archive']);

        $query -> closeCursor();

        return $meeting;
    }

    public function getMeetings() {

        $query = $this -> pdo -> prepare('SELECT * FROM meetings');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $meetings = array();
        foreach ($results as $result) {
            $meetings[] = new Meeting($result['id'], $result['creator_id'], $result['project_id'], $result['date'], $result['duration'], $result['subject'], $result['description'], $result['summary'], $result['archive']);
        }

        $query -> closeCursor();

        return $meetings;
    }

    public function removeMeeting($meeting) {

        $query = $this -> pdo -> prepare('DELETE FROM meetings WHERE id = :id');
        $query -> bindValue('id', $meeting -> getId());
        $query -> execute();

    }



}

?>