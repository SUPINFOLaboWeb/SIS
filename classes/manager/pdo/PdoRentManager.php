<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoRentManager extends AbstractPdoManager implements RentManager {

    public function addRent($rent) {

        $query = $this -> pdo -> prepare('INSERT INTO rents (campus_id, author_id, item_id, id_booster, lastname, firstname, creation_date, endDate, is_return) VALUES (:campus_id, :author_id, :item_id, :id_booster, :lastname, :firstname, :creation_date, :endDate, :is_return)');
        $query -> bindValue(':campus_id', $rent -> getCampusId());
        $query -> bindValue(':author_id', $rent -> getAuthorId());
        $query -> bindValue(':item_id', $rent -> getItemId());
        $query -> bindValue(':id_booster', $rent -> getIdBooster());
        $query -> bindValue(':lastname', $rent -> getLastname());
        $query -> bindValue(':firstname', $rent -> getFirstname());
        $query -> bindValue(':creation_date', $rent -> getCreationDate());
        $query -> bindValue(':endDate', $rent -> getEndDate());
        $query -> bindValue(':is_return', $rent -> getIsReturn());
        $query -> execute();

    }

    public function updateRent($rent) {

        $query = $this -> pdo -> prepare('UPDATE rents SET campus_id = :campus_id, author_id = :author_id, item_id = :item_id, id_booster = :id_booster, lastname = :lastname, firstname = :firstname, creation_date = :creation_date, endDate = :endDate, is_return = :is_return WHERE id = :id');
        $query -> bindValue(':campus_id', $rent -> getCampusId());
        $query -> bindValue(':author_id', $rent -> getAuthorId());
        $query -> bindValue(':item_id', $rent -> getItemId());
        $query -> bindValue(':id_booster', $rent -> getIdBooster());
        $query -> bindValue(':lastname', $rent -> getLastname());
        $query -> bindValue(':firstname', $rent -> getFirstname());
        $query -> bindValue(':creation_date', $rent -> getCreationDate());
        $query -> bindValue(':endDate', $rent -> getEndDate());
        $query -> bindValue(':is_return', $rent -> getIsReturn());
        $query -> bindValue(':id', $rent -> getId());
        $query -> execute();

    }

    public function getRent($id) {

        $query = $this -> pdo -> prepare('SELECT * FROM rents WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $rent = new Rent($result['id'], $result['campus_id'], $result['author_id'], $result['item_id'], $result['id_booster'], $result['lastname'], $result['firstname'], $result['creation_date'], $result['endDate'], $result['is_return']);

        $query -> closeCursor();

        return $rent;
    }

    public function getRents() {

        $query = $this -> pdo -> prepare('SELECT * FROM rents');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $rents = array();
        foreach ($results as $result) {
            $rents[] = new Rent($result['id'], $result['campus_id'], $result['author_id'], $result['item_id'], $result['id_booster'], $result['lastname'], $result['firstname'], $result['creation_date'], $result['endDate'], $result['is_return']);
        }

        $query -> closeCursor();

        return $rents;
    }

    public function removeRent($rent) {

        $query = $this -> pdo -> prepare('DELETE FROM rents WHERE id = :id');
        $query -> bindValue('id', $rent -> getId());
        $query -> execute();

    }



}

?>