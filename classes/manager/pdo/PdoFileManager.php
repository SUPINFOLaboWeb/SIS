<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoFileManager extends AbstractPdoManager implements FileManager {

    public function addFile($file) {

        $query = $this -> pdo -> prepare('INSERT INTO files (creator_id, parent_id, project_id, name, archive, content, creation_date, is_directory) VALUES (:creator_id, :parent_id, :project_id, :name, :archive, :content, :creation_date, :is_directory)');
        $query -> bindValue(':creator_id', $file -> getCreatorId());
        $query -> bindValue(':parent_id', $file -> getParentId());
        $query -> bindValue(':project_id', $file -> getProjectId());
        $query -> bindValue(':name', $file -> getName());
        $query -> bindValue(':archive', $file -> getArchive());
        $query -> bindValue(':content', $file -> getContent());
        $query -> bindValue(':creation_date', $file -> getCreationDate());
        $query -> bindValue(':is_directory', $file -> getIsDirectory());
        $query -> execute();

    }

    public function updateFile($file) {

        $query = $this -> pdo -> prepare('UPDATE files SET creator_id = :creator_id, parent_id = :parent_id, project_id = :project_id, name = :name, archive = :archive, content = :content, creation_date = :creation_date, is_directory = :is_directory WHERE id = :id');
        $query -> bindValue(':creator_id', $file -> getCreatorId());
        $query -> bindValue(':parent_id', $file -> getParentId());
        $query -> bindValue(':project_id', $file -> getProjectId());
        $query -> bindValue(':name', $file -> getName());
        $query -> bindValue(':archive', $file -> getArchive());
        $query -> bindValue(':content', $file -> getContent());
        $query -> bindValue(':creation_date', $file -> getCreationDate());
        $query -> bindValue(':is_directory', $file -> getIsDirectory());
        $query -> bindValue(':id', $file -> getId());
        $query -> execute();

    }

    public function getFile($id) {

        $query = $this -> pdo -> prepare('SELECT * FROM files WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $file = new File($result['id'], $result['creator_id'], $result['parent_id'], $result['project_id'], $result['name'], $result['archive'], $result['content'], $result['creation_date'], $result['is_directory']);

        $query -> closeCursor();

        return $file;
    }

    public function getFiles() {

        $query = $this -> pdo -> prepare('SELECT * FROM files');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $files = array();
        foreach ($results as $result) {
            $files[] = new File($result['id'], $result['creator_id'], $result['parent_id'], $result['project_id'], $result['name'], $result['archive'], $result['content'], $result['creation_date'], $result['is_directory']);
        }

        $query -> closeCursor();

        return $files;
    }

    public function removeFile($file) {

        $query = $this -> pdo -> prepare('DELETE FROM files WHERE id = :id');
        $query -> bindValue('id', $file -> getId());
        $query -> execute();

    }


}

?>