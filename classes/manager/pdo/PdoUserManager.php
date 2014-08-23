<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoUserManager extends AbstractPdoManager implements UserManager {

    public function addUser($user) {

        $query = $this -> pdo -> prepare('INSERT INTO users (id_booster, campus_id, privilege_id, lastname, firstname, password) VALUES (:id_booster, :campus_id, :privilege_id, :lastname, :firstname, :password)');
        $query -> bindValue(':id_booster', $user -> getIdBooster());
        $query -> bindValue(':campus_id', $user -> getCampusId());
        $query -> bindValue(':privilege_id', $user -> getPrivilegeId());
        $query -> bindValue(':lastname', $user -> getLastname());
        $query -> bindValue(':firstname', $user -> getFirstname());
        $query -> bindValue(':password', $user -> getPassword());
        $query -> execute();

    }

    public function updateUser($user) {

        $query = $this -> pdo -> prepare('UPDATE users SET id_booster = :id_booster, campus_id = :campus_id, privilege_id = :privilege_id, lastname = :lastname, firstname = :firstname, password = :password WHERE id = :id');
        $query -> bindValue(':id_booster', $user -> getIdBooster());
        $query -> bindValue(':campus_id', $user -> getCampusId());
        $query -> bindValue(':privilege_id', $user -> getPrivilegeId());
        $query -> bindValue(':lastname', $user -> getLastname());
        $query -> bindValue(':firstname', $user -> getFirstname());
        $query -> bindValue(':password', $user -> getPassword());
        $query -> bindValue(':id', $user -> getId());
        $query -> execute();

    }

    public function getUser($id) {

        $query = $this -> pdo -> prepare('SELECT * FROM users WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $user = new User($result['id'], $result['id_booster'], $result['campus_id'], $result['privilege_id'], $result['lastname'], $result['firstname'], $result['password']);

        $query -> closeCursor();

        return $user;
    }

    public function getUsers() {

        $query = $this -> pdo -> prepare('SELECT * FROM users');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $users = array();
        foreach ($results as $result) {
            $users[] = new User($result['id_booster'], $result['campus_id'], $result['privilege_id'], $result['lastname'], $result['firstname'], $result['password']);
        }

        $query -> closeCursor();

        return $users;
    }

    public function removeUser($user) {

        $query = $this -> pdo -> prepare('DELETE FROM users WHERE id = :id');
        $query -> bindValue('id', $user -> getId());
        $query -> execute();

    }



}

?>