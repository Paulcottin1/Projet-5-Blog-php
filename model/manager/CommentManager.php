<?php
namespace App\model\manager;
use App\model\entity\Comment;

Class CommentManager extends AbstractManager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $req->execute(array($postId));

        
        $comments = [];
        while($data = $req->fetch())
        {
            $comment = $this->getComment($data['id']);
            $comments[] = $comment;
        }

        return $comments;
    }

    public function getComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment FROM comments WHERE id = ?');
        $req->execute(array($id));

        $data = $req->fetch();
        $comment = new Comment;
            
        $comment
        ->setId($data['id'])
        ->setAuthor($data['author'])
        ->setComment($data['comment']);

        return $comment;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
}
