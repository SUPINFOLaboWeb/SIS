<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoProjectCommentManager extends AbstractPdoManager implements ProjectCommentManager {

    public function addProjectComment($projectComment) {

        $query = $this -> pdo -> prepare('INSERT INTO project_comments (project_id, author_id, publication_date, content) VALUES (:project_id, :author_id, :publication_date, :content)');
        $query -> bindValue(':project_id', $projectComment -> getProjectId());
        $query -> bindValue(':author_id', $projectComment -> getAuthorId());
        $query -> bindValue(':publication_date', $projectComment -> getPublicationDate());
        $query -> bindValue(':content', $projectComment -> getContent());
        $query -> execute();

    }

    public function updateProjectComment($projectComment) {

        $query = $this -> pdo -> prepare('UPDATE project_comments SET creator_id = :creator_id, parent_id = :parent_id, project_id = :project_id, name = :name, archive = :archive, content = :content, creation_date = :creation_date, is_directory = :is_directory WHERE id = :id');
        $query -> bindValue(':project_id', $projectComment -> getProjectId());
        $query -> bindValue(':author_id', $projectComment -> getAuthorId());
        $query -> bindValue(':publication_date', $projectComment -> getPublicationDate());
        $query -> bindValue(':content', $projectComment -> getContent());
        $query -> bindValue(':id', $projectComment -> getId());
        $query -> execute();

    }

    public function getProjectComment($id) {

        $query = $this -> pdo -> prepare('SELECT * FROM project_comments WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $projectComment = new ProjectComment($result['id'], $result['project_id'], $result['author_id'], $result['publication_date'], $result['content']);

        $query -> closeCursor();

        return $projectComment;
    }

    public function getProjectComments() {

        $query = $this -> pdo -> prepare('SELECT * FROM project_comments');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $projectComments = array();
        foreach ($results as $result) {
            $projectComments[] = new ProjectComment($result['id'], $result['project_id'], $result['author_id'], $result['publication_date'], $result['content']);
        }

        $query -> closeCursor();

        return $projectComments;
    }

    public function removeProjectComment($projectComment) {

        $query = $this -> pdo -> prepare('DELETE FROM project_comments WHERE id = :id');
        $query -> bindValue('id', $projectComment -> getId());
        $query -> execute();

    }



}

?>