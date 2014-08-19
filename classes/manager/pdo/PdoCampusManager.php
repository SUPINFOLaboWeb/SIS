<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoCampusManager extends AbstractPdoManager implements CampusManager {

    function addCampus($campus){

        $query = $this -> pdo -> prepare('INSERT INTO campuses (campus_name) VALUES (:campusName)');
        $query -> bindValue(':campus_name', $campus -> getCampusName());
        $query -> execute();

    }

    function updateCampus($campus){

        $query = $this -> pdo -> prepare('UPDATE campuses SET campus_name = :campus_name WHERE id = :id');
        $query -> bindValue(':campus_name', $campus -> getCampusName());
        $query -> bindValue(':id', $campus -> getId());
        $query -> execute();

    }

    function getCampus($id){

        $query = $this -> pdo -> prepare('SELECT * FROM campuses WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $campus = new Campus($result['id'], $result['campus_name']);

        $query -> closeCursor();

        return $campus;
    }

    function getCampuses(){

        $query = $this -> pdo -> prepare('SELECT * FROM campuses');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $campuses = array();
        foreach ($results as $result) {
            $campuses[] = new Campus($result['id'], $result['campus_name']);
        }

        $query -> closeCursor();

        return $campuses;
    }

    function removeCampus($campus){

        $query = $this -> pdo -> prepare('DELETE FROM campuses WHERE id = :id');
        $query -> bindValue('id', $campus -> getId());
        $query -> execute();

    }

}

?>