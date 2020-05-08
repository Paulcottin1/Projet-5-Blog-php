<?php
namespace App\model\manager;
use App\model\manager\CommentManager;
use App\model\entity\Post;

Class PostManager extends AbstractManager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        
        $posts = [];
        while($data = $req->fetch())
        {
            $post = $this->getPost($data['id']);
            $posts[] = $post;
        }
        
        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $commentsManager = new CommentManager;

        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        
        $data = $req->fetch();
        $post = new Post;
        
        $post
        ->setId($data['id'])
        ->setTitle($data['title'])
        ->setContent($data['content'])
        ->setComments($commentsManager->getComments($data['id']));
        
        return $post;
    }
}
