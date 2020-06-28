<?php
namespace App\manager;
use App\entity\Comment;

Class CommentManager extends AbstractManager
{   
    public function getCommentUnPublished()
     {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments WHERE publish = 0');
        $req->execute();
        
        $comments = [];
        while($data = $req->fetch()) {
            $comment = new Comment();
            $comments[] = $comment
            ->setId($data['id'])
            ->setAuthor($data['author'])
            ->setComment($data['comment'])
            ->setPostId($data['post_id']);
        }
        
        return $comments;
    }
    public function getComments($postId)
    {
        if(!empty($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $debut = ($page - 1) * 10;
        $db = $this->dbConnect();
        $req = $db->prepare(
            'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') 
            AS comment_date_fr FROM comments WHERE post_id = ? AND publish = 1 ORDER BY comment_date 
            DESC LIMIT 10 OFFSET '.$debut
        );
        $req->execute(array($postId));

        $comments = [];
        while($data = $req->fetch()) {
            $comment = $this->getComment($data['id']);
            $comments[] = $comment;
        }

        return $comments;
    }

    public function getComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, user_id, author, comment FROM comments WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();

        $data = $req->fetch();
        $comment = new Comment();
            
        $comment
        ->setId($data['id'])
        ->setAuthor($data['author'])
        ->setUserId($data['user_id'])
        ->setComment($data['comment']);

        return $comment;
    }

    public function postComment($postId, $userId, $author, $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'INSERT INTO comments(post_id, user_id, author, comment, comment_date) 
            VALUES(:postId, :userId, :author, :comment, NOW())'
        );
        $req->bindValue(':postId', $postId);
        $req->bindValue(':userId', $userId);
        $req->bindValue(':author', $author);
        $req->bindValue(':comment', $comment);
        $affectedLines = $req->execute();

        return $affectedLines;
    }

    public function updateComment($id, $comment) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment = :comment WHERE id = :id');
        $req->bindValue(':comment', $comment);
        $req->bindValue(':id', $id);
        $affectedLines = $req->execute();

        return $affectedLines;
    }

    public function countComment()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT count(id) FROM comments');
        $totalPost = $req->fetchColumn();

        return $totalPost;
    }

    public function publishComment($commentId) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET publish = 1 WHERE id = :id');
        $req->bindValue(':id', $commentId);
        $affectedLines = $req->execute();

        return $affectedLines;
    }
}
