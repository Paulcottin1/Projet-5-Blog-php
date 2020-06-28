<?php
namespace App\manager;
use App\manager\CommentManager;
use App\entity\Post;

Class PostManager extends AbstractManager
{
    public function getPosts($limite)
    {
        if(!empty($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $debut = ($page - 1) * $limite;
        $db = $this->dbConnect();
        $req = $db->query(
            'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
            AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT '.$limite.'
            OFFSET '.$debut
        );
        
        $posts = [];
        while($data = $req->fetch()) {
            $post = $this->getPost($data['id']);
            $posts[] = $post;
        }
        
        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $commentsManager = new CommentManager();

        $req = $db->prepare(
            'SELECT id, title, content, img, chapo, DATE_FORMAT
            (creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS 
            creation_date_fr FROM posts WHERE id = ?'
        );
        $req->execute(array($postId));
        
        $data = $req->fetch();
        $post = new Post();
        
        $post
        ->setId($data['id'])
        ->setTitle($data['title'])
        ->setContent($data['content'])
        ->setComments($commentsManager->getComments($data['id']))
        ->setImg($data['img'])
        ->setChapo($data['chapo']);
        
        return $post;
    }

    public function addPost($title, $content, $img, $chapo)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare(
            'INSERT INTO posts(title, content, creation_date, img, chapo)
            VALUES(?, ?, NOW(), ?, ?)'
        );
        $affectedLines = $comments->execute(array($title, $content, $img, $chapo));

        return $affectedLines;
    }

    public function update($id, $title, $chapo,  $content, $img)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title= ? , content = ? , img = ? , chapo = ? WHERE id = '.$id);
        $req->bindValue(1, $title);
        $req->bindValue(2, $content);
        $req->bindValue(3, $img);
        $req->bindValue(4, $chapo);
        $affectedLines = $req->execute();

        return $affectedLines;
    }

    public function delete($postId)
     {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM `posts` WHERE id = ?');
        $affectedLines = $req->execute(array($postId));

        return $affectedLines;
    }

    public function countPost()
     {
        $db = $this->dbConnect();
        $req = $db->query('SELECT count(id) FROM posts');
        $totalPost = $req->fetchColumn();

        return $totalPost;
    }
}
