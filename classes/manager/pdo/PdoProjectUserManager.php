<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoProjectUserManager extends AbstractPdoManager implements ProjectUserManager {

    public function addProjectUser($projectUser) {

        $query = $this -> pdo -> prepare('INSERT INTO project_users (user_id, project_id, status) VALUES (:user_id, :project_id, :status)');
        $query -> bindValue(':user_id', $projectUser -> getUserId());
        $query -> bindValue(':project_id', $projectUser -> getProjectId());
        $query -> bindValue(':status', $projectUser -> getStatus());
        $query -> execute();

    }

    public function updateProjectUser($projectUser) {

        $query = $this -> pdo -> prepare('UPDATE project_users SET user_id = :user_id, project_id = :project_id, status = :status WHERE id = :id');
        $query -> bindValue(':user_id', $projectUser -> getUserId());
        $query -> bindValue(':project_id', $projectUser -> getProjectId());
        $query -> bindValue(':status', $projectUser -> getStatus());
        $query -> bindValue(':id', $projectUser -> getId());
        $query -> execute();

    }

    public function getProjectUser($id) {

        $query = $this -> pdo -> prepare('SELECT * FROM project_users WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $projectUser = new ProjectUser($result['id'], $result['user_id'], $result['project_id'], $result['status']);

        $query -> closeCursor();

        return $projectUser;
    }

    public function getProjectUsers() {

        $query = $this -> pdo -> prepare('SELECT * FROM project_users');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $projectUsers = array();
        foreach ($results as $result) {
            $projectUsers[] = new ProjectUser($result['id'], $result['user_id'], $result['project_id'], $result['status']);
        }

        $query -> closeCursor();

        return $projectUsers;
    }

    public function removeProjectUser($projectUser) {

        $query = $this -> pdo -> prepare('DELETE FROM project_users WHERE id = :id');
        $query -> bindValue('id', $projectUser -> getId());
        $query -> execute();

    }



}

?>