<?php

require_once('protected/required.php');

class PdoLogManager extends AbstractPdoManager implements LogManager {


    public function addLog($log){

        $query = $this -> pdo -> prepare('INSERT INTO logs (campus_id, author_id, creation_date, content) VALUES (:campus_id, :author_id, :creation_date, :content)');
        $query -> bindValue(':campus_id', $log -> getCampusId());
        $query -> bindValue(':author_id', $log -> getAuthorId());
        $query -> bindValue(':creation_date', $log -> getCreationDate());
        $query -> bindValue(':content', $log -> getContent());
        $query -> execute();

    }

    public function updateLog($log){

        $query = $this -> pdo -> prepare('UPDATE logs SET campus_id = :campus_id, author_id = :author_id, creation_date = :creation_date, content = :content WHERE id = :id');
        $query -> bindValue(':campus_id', $log -> getCampusId());
        $query -> bindValue(':author_id', $log -> getAuthorId());
        $query -> bindValue(':creation_date', $log -> getCreationDate());
        $query -> bindValue(':content', $log -> getContent());
        $query -> bindValue(':id', $log -> getId());
        $query -> execute();

    }

    public function getLog($id){

        $query = $this -> pdo -> prepare('SELECT * FROM logs WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $log = new Log($result['id'], $result['campus_id'], $result['author_id'], $result['creation_date'], $result['content']);

        $query -> closeCursor();

        return $log;
    }

    public function getLogs(){

        $query = $this -> pdo -> prepare('SELECT * FROM logs');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $logs = array();
        foreach ($results as $result) {
            $logs[] = new Log($result['id'], $result['campus_id'], $result['author_id'], $result['creation_date'], $result['content']);
        }

        $query -> closeCursor();

        return $logs;

    }

    public function removeLog($log){

        $query = $this -> pdo -> prepare('DELETE FROM logs WHERE id = :id');
        $query -> bindValue('id', $log -> getId());
        $query -> execute();

    }
}

?>