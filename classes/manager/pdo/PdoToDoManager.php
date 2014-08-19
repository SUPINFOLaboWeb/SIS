<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoTodoManager extends AbstractPdoManager implements ToDoManager {

    public function addToDo($to_do) {

        $query = $this -> pdo -> prepare('INSERT INTO to_do (campus_id, author_id, creation_date, content, status) VALUES (:campus_id, :author_id, :creation_date, :content, :status)');
        $query -> bindValue(':campus_id', $to_do -> getCampusId());
        $query -> bindValue(':author_id', $to_do -> getAuthorId());
        $query -> bindValue(':creation_date', $to_do -> getCreationDate());
        $query -> bindValue(':content', $to_do -> getContent());
        $query -> bindValue(':status', $to_do -> getStatus());
        $query -> execute();

    }

    public function updateToDo($to_do) {

        $query = $this -> pdo -> prepare('UPDATE to_do SET campus_id = :campus_id, author_id = :author_id, creation_date = :creation_date, content = :content, status = :status WHERE id = :id');
        $query -> bindValue(':campus_id', $to_do -> getCampusId());
        $query -> bindValue(':author_id', $to_do -> getAuthorId());
        $query -> bindValue(':creation_date', $to_do -> getCreationDate());
        $query -> bindValue(':content', $to_do -> getContent());
        $query -> bindValue(':status', $to_do -> getStatus());
        $query -> bindValue(':id', $to_do -> getId());
        $query -> execute();

    }

    public function getToDo($id) {

        $query = $this -> pdo -> prepare('SELECT * FROM to_do WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $to_do = new ToDo($result['id'], $result['campus_id'], $result['author_id'], $result['creation_date'], $result['content'], $result['status']);

        $query -> closeCursor();

        return $to_do;
    }

    public function getToDos() {

        $query = $this -> pdo -> prepare('SELECT * FROM to_do');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $to_dos = array();
        foreach ($results as $result) {
            $to_dos[] = new ToDo($result['id'], $result['campus_id'], $result['author_id'], $result['creation_date'], $result['content'], $result['status']);
        }

        $query -> closeCursor();

        return $to_dos;
    }

    public function removeToDo($to_do) {

        $query = $this -> pdo -> prepare('DELETE FROM to_do WHERE id = :id');
        $query -> bindValue('id', $to_do -> getId());
        $query -> execute();

    }



}

?>