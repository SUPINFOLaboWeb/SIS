<?php

require_once('../classes/manager/pdo/AbstractPdoManager.php');
require_once('../protected/required.php');

class PdoNewsCommentManager extends AbstractPdoManager implements NewsCommentManager {

    public function addNewsComment($newsComment) {

        $query = $this -> pdo -> prepare('INSERT INTO $news_comments (news_id, author_id, publication_date, content) VALUES (:news_id, :author_id, :publication_date, :content)');
        $query -> bindValue(':news_id', $newsComment -> getNewsId());
        $query -> bindValue(':author_id', $newsComment -> getAuthorId());
        $query -> bindValue(':publication_date', $newsComment -> getPublicationDate());
        $query -> bindValue(':content', $newsComment -> getContent());
        $query -> execute();

    }

    public function updateNewsComment($newsComment) {

        $query = $this -> pdo -> prepare('UPDATE $news_comments SET news_id = :news_id, author_id = :author_id, publication_date = :publication_date, content = :content WHERE id = :id');
        $query -> bindValue(':news_id', $newsComment -> getNewsId());
        $query -> bindValue(':author_id', $newsComment -> getAuthorId());
        $query -> bindValue(':publication_date', $newsComment -> getPublicationDate());
        $query -> bindValue(':content', $newsComment -> getContent());
        $query -> bindValue(':id', $newsComment -> getId());
        $query -> execute();

    }

    public function getNewsComment($id) {

        $query = $this -> pdo -> prepare('SELECT * FROM $news_comments WHERE id = :id');
        $query -> bindValue(':id', $id);
        $query -> execute();

        $result = $query -> fetch(PDO::FETCH_ASSOC);
        $newsComment = new NewsComment($result['id'], $result['news_id'], $result['author_id'], $result['publication_date'], $result['content']);

        $query -> closeCursor();

        return $newsComment;
    }

    public function getNewsComments() {

        $query = $this -> pdo -> prepare('SELECT * FROM $news_comments');
        $query -> execute();

        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        $newsComments = array();
        foreach ($results as $result) {
            $newsComments[] = new NewsComment($result['id'], $result['news_id'], $result['author_id'], $result['publication_date'], $result['content']);
        }

        $query -> closeCursor();

        return $newsComments;
    }

    public function removeNewsComment($newsComment) {

        $query = $this -> pdo -> prepare('DELETE FROM $news_comments WHERE id = :id');
        $query -> bindValue('id', $newsComment -> getId());
        $query -> execute();

    }



}

?>