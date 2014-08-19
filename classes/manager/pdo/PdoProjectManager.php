<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoProjectManager extends AbstractPdoManager implements ProjectManager {

    public function addProject($project) {

        $query = $this -> pdo -> prepare('INSERT INTO projects (campus_id, creator_id, project_id, name, creation_date, deadline_date, progress, description, technologies) VALUES (:campus_id, :creator_id, :project_id, :name, :creation_date, :deadline_date, :progress, :description, :technologies)');
        $query -> bindValue(':campus_id', $project -> getCampusId());
        $query -> bindValue(':creator_id', $project -> getCreatorId());
        $query -> bindValue(':project_id', $project -> getProjectId());
        $query -> bindValue(':name', $project -> getName());
        $query -> bindValue(':creation_date', $project -> getCreationDate());
        $query -> bindValue(':deadline_date', $project -> getDeadlineDate());
        $query -> bindValue(':progress', $project -> getProgress());
        $query -> bindValue(':description', $project -> getDescription());
        $query -> bindValue(':technologies', $project -> getTechnologies());
        $query -> execute();

    }

    public function updateProject($project) {

        $query = $this -> pdo -> prepare('UPDATE projects SET campus_id = :campus_id, creator_id = :creator_id, project_id = :project_id, name = :name, creation_date = :creation_date, deadline_date = :deadline_date, progress = :progress, description = :description, technologies = :technologies WHERE id = :id');
        $query -> bindValue(':campus_id', $project -> getCampusId());
        $query -> bindValue(':creator_id', $project -> getCreatorId());
        $query -> bindValue(':project_id', $project -> getProjectId());
        $query -> bindValue(':name', $project -> getName());
        $query -> bindValue(':creation_date', $project -> getCreationDate());
        $query -> bindValue(':deadline_date', $project -> getDeadlineDate());
        $query -> bindValue(':progress', $project -> getProgress());
        $query -> bindValue(':description', $project -> getDescription());
        $query -> bindValue(':technologies', $project -> getTechnologies());
        $query -> bindValue(':id', $project -> getId());
        $query -> execute();

    }

    public function getProject($id) {

        $query = $this -> pdo -> prepare('SELECT * FROM projects WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $project = new Project($result['id'], $result['campus_id'], $result['creator_id'], $result['project_id'], $result['name'], $result['creation_date'], $result['deadline_date'], $result['progress'], $result['description'], $result['technologies']);

        $query -> closeCursor();

        return $project;
    }

    public function getProjects() {

        $query = $this -> pdo -> prepare('SELECT * FROM projects');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $projects = array();
        foreach ($results as $result) {
            $projects[] = new Project($result['id'], $result['campus_id'], $result['creator_id'], $result['project_id'], $result['name'], $result['creation_date'], $result['deadline_date'], $result['progress'], $result['description'], $result['technologies']);
        }

        $query -> closeCursor();

        return $projects;
    }

    public function removeProject($project) {

        $query = $this -> pdo -> prepare('DELETE FROM projects WHERE id = :id');
        $query -> bindValue('id', $project -> getId());
        $query -> execute();

    }



}

?>