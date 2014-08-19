<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoNewsManager extends AbstractPdoManager implements NewsManager {

    public function addNew($new) {

        $query = $this -> pdo -> prepare('INSERT INTO news (author_id, publication_date, content) VALUES (:author_id, :publication_date, :content)');
        $query -> bindValue(':author_id', $new -> getAuthorId());
        $query -> bindValue(':publication_date', $new -> getPublicationDate());
        $query -> bindValue(':content', $new -> getContent());
        $query -> execute();

    }

    public function updateNew($new) {

        $query = $this -> pdo -> prepare('UPDATE news SET author_id = :author_id, publication_date = :publication_date, content = :content WHERE id = :id');
        $query -> bindValue(':author_id', $new -> getAuthorId());
        $query -> bindValue(':publication_date', $new -> getPublicationDate());
        $query -> bindValue(':content', $new -> getContent());
        $query -> bindValue(':id', $new -> getId());
        $query -> execute();

    }

    public function getNew($id) {

        $query = $this -> pdo -> prepare('SELECT * FROM news WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $new = new News($result['id'], $result['author_id'], $result['publication_date'], $result['content']);

        $query -> closeCursor();

        return $new;
    }

    public function getNews() {

        $query = $this -> pdo -> prepare('SELECT * FROM news');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $news = array();
        foreach ($results as $result) {
            $news[] = new News($result['id'], $result['author_id'], $result['publication_date'], $result['content']);
        }

        $query -> closeCursor();

        return $news;
    }

    public function removeNew($new) {

        $query = $this -> pdo -> prepare('DELETE FROM news WHERE id = :id');
        $query -> bindValue('id', $new -> getId());
        $query -> execute();

    }



}

?>