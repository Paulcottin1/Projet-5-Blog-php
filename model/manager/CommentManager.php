<?php

Class CommentManager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $req->execute(array($postId));

        
        $comments = [];
        while($data = $req->fetch())
        {
            $comment = new Comment;
            $comment->setId($data['id'])->setPostId($postId)->setAuthor($data['author'])->setComment($data['comment']);
            $comments[] = $comment;
        }

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function dbConnect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}
