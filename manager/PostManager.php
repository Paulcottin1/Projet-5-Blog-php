<?php
namespace App\manager;
use App\manager\CommentManager;
use App\entity\Post;

Class PostManager extends AbstractManager
{  
    /**
     * get posts with limite
     * @param  int $limite
     * @return array $posts
     */
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
    
    /**
     * get post with post id
     * @param  int $postId
     * @return $post
     */
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $commentsManager = new CommentManager();

        $req = $db->prepare(
            'SELECT id, title, content, img, chapo, DATE_FORMAT
            (creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS 
            creation_date_fr FROM posts WHERE id = :id'
        );
        $req->bindValue(':id', $postId);
        $req->execute();
        
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
    
    /**
     * add new post
     * @param  string $title
     * @param  string $content
     * @param  string $img
     * @param  string $chapo
     * @return $affectedLines
     */
    public function addPost($title, $content, $img, $chapo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'INSERT INTO posts(title, content, creation_date, img, chapo)
            VALUES(:title, :content, NOW(), :img, :chapo)'
        );
        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $req->bindValue(':img', $img);
        $req->bindValue(':chapo', $chapo);
        $affectedLines = $req->execute();

        return $affectedLines;
    }
    
    /**
     * update post
     * @param  int $id
     * @param  string $title
     * @param  string $chapo
     * @param  string $content
     * @param  string $img
     * @return $affectedLines
     */
    public function update($id, $title, $chapo,  $content, $img)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title= :title , content = :content , img = :img , chapo = :chapo WHERE id = :id');
        $req->bindValue(':title', $title);
        $req->bindValue(':content', $content);
        $req->bindValue(':img', $img);
        $req->bindValue(':chapo', $chapo);
        $req->bindValue(':id', $id);
        $affectedLines = $req->execute();

        return $affectedLines;
    }
    
    /**
     * delete post 
     * @param  int $postId
     * @return $affectedLines
     */
    public function delete($postId)
     {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM `posts` WHERE id = :id');
        $req->bindValue(':id', $postId);
        $affectedLines = $req->execute();

        return $affectedLines;
    }
    
    /**
     * count all post
     * @return $totalPost
     */
    public function countPost()
     {
        $db = $this->dbConnect();
        $req = $db->query('SELECT count(id) FROM posts');
        $totalPost = $req->fetchColumn();

        return $totalPost;
    }
}
