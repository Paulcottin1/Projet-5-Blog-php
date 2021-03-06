<?php
namespace App\manager;
use App\entity\Comment;

Class CommentManager extends AbstractManager
{       
    /**
     * Return comments unpublished
     * @return $comments
     */
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
            ->setComment($data['comment'])
            ->setPostId($data['post_id'])
            ->setUserId($data['user_id']);
        }
        
        return $comments;
    }    

    /**
     * get comments for a post
     * @param  int $postId
     * @return $comments
     */
    public function getComments($postId)
    {
        $debut = 1;
        $db = $this->dbConnect();
        $req = $db->prepare(
            'SELECT id, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') 
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
    
    /**
     * get comment with id
     * @param  int $id
     * @return $comment
     */
    public function getComment($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, user_id, comment FROM comments WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();

        $data = $req->fetch();
        $comment = new Comment();
            
        $comment
        ->setId($data['id'])
        ->setUserId($data['user_id'])
        ->setComment($data['comment']);

        return $comment;
    }
    
    /**
     * post a comment
     * @param  int $postId
     * @param  int $userId
     * @param  string $comment
     * @return $affectedLines
     */
    public function postComment($postId, $userId, $comment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'INSERT INTO comments(post_id, user_id, comment, comment_date) 
            VALUES(:postId, :userId, :comment, NOW())'
        );
        $req->bindValue(':postId', $postId);
        $req->bindValue(':userId', $userId);
        $req->bindValue(':comment', $comment);
        $affectedLines = $req->execute();

        return $affectedLines;
    }
    
    /**
     * update a comment
     * @param  int $id
     * @param  string $comment
     * @return $affectedLines
     */
    public function updateComment($id, $comment) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET comment = :comment WHERE id = :id');
        $req->bindValue(':comment', $comment);
        $req->bindValue(':id', $id);
        $affectedLines = $req->execute();

        return $affectedLines;
    }
    
    /**
     * count comments
     * @return $totalComment
     */
    public function countComment()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT count(id) FROM comments WHERE publish = 0');
        $totalComment = $req->fetchColumn();

        return $totalComment;
    }
    
    /**
     * posting comment after validation
     * @param  int $commentId
     * @return $affectedLines
     */
    public function publishComment($commentId) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET publish = 1 WHERE id = :id');
        $req->bindValue(':id', $commentId);
        $affectedLines = $req->execute();

        return $affectedLines;
    }
}
