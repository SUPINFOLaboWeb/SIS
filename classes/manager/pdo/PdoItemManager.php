<?php

require_once('protected/required.php');

class PdoItemManager extends AbstractPdoManager implements ItemManager {

    function addItem($item){

        $query = $this -> pdo -> prepare('INSERT INTO items (campus_id, type, vendor, model, sn, status, comment) VALUES (:campus_id, :type, :vendor, :model, :sn, :status, :comment)');
        $query -> bindValue(':campus_id', $item -> getCampusId());
        $query -> bindValue(':type', $item -> getType());
        $query -> bindValue(':vendor', $item -> getVendor());
        $query -> bindValue(':model', $item -> getModel());
        $query -> bindValue(':sn', $item -> getSn());
        $query -> bindValue(':status', $item -> getStatus());
        $query -> bindValue(':comment', $item -> getComment());
        $query -> execute();

    }

    function updateItem($item){

        $query = $this -> pdo -> prepare('UPDATE items SET campus_id = :campus_id, type = :type, vendor = :vendor, model = :model, sn = :sn, status = :status, comment = :comment WHERE id = :id');
        $query -> bindValue(':campus_id', $item -> getCampusId());
        $query -> bindValue(':type', $item -> getType());
        $query -> bindValue(':vendor', $item -> getVendor());
        $query -> bindValue(':model', $item -> getModel());
        $query -> bindValue(':sn', $item -> getSn());
        $query -> bindValue(':status', $item -> getStatus());
        $query -> bindValue(':comment', $item -> getComment());
        $query -> bindValue(':id', $item -> getId());
        $query -> execute();

    }

    function getItem($id){

        $query = $this -> pdo -> prepare('SELECT * FROM items WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $item = new Item($result['id'], $result['campus_id'], $result['type'], $result['vendor'], $result['model'], $result['sn'], $result['status'], $result['comment']);

        $query -> closeCursor();

        return $item;
    }

    function getItems(){

        $query = $this -> pdo -> prepare('SELECT * FROM items');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $items = array();
        foreach ($results as $result) {
            $items[] = new Item($result['id'], $result['campus_id'], $result['type'], $result['vendor'], $result['model'], $result['sn'], $result['status'], $result['comment']);
        }

        $query -> closeCursor();

        return $items;

    }

    function removeItem($item){

        $query = $this -> pdo -> prepare('DELETE FROM items WHERE id = :id');
        $query -> bindValue('id', $item -> getId());
        $query -> execute();

    }



}

?>