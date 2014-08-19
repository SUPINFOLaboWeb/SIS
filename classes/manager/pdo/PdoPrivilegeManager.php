<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoPrivilegeManager extends AbstractPdoManager implements PrivilegeManager {

    public function addPrivilege($privilege) {

        $query = $this -> pdo -> prepare('INSERT INTO privileges (privilege_name) VALUES (:privilege_name)');
        $query -> bindValue(':privilege_name', $privilege -> getPrivilegeName());
        $query -> execute();

    }

    public function updatePrivilege($privilege) {

        $query = $this -> pdo -> prepare('UPDATE privileges SET privilege_name = :privilege_name WHERE id = :id');
        $query -> bindValue(':privilege_name', $privilege -> getPrivilegeName());
        $query -> bindValue(':id', $privilege -> getId());
        $query -> execute();

    }

    public function getPrivilege($id) {

        $query = $this -> pdo -> prepare('SELECT * FROM privileges WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $privilege = new Privilege($result['id'], $result['privilege_name']);

        $query -> closeCursor();

        return $privilege;
    }

    public function getPrivileges() {

        $query = $this -> pdo -> prepare('SELECT * FROM privileges');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $privileges = array();
        foreach ($results as $result) {
            $privileges[] = new Privilege($result['id'], $result['privilege_name']);
        }

        $query -> closeCursor();

        return $privileges;
    }

    public function removePrivilege($privilege) {

        $query = $this -> pdo -> prepare('DELETE FROM privileges WHERE id = :id');
        $query -> bindValue('id', $privilege -> getId());
        $query -> execute();

    }



}

?>