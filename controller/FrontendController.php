<?php
namespace App\controller;
use App\model\manager\PostManager;
use App\model\manager\CommentManager;

Class FrontendController {

    public function listPosts()
    {   
        $manager = new PostManager;
        $posts = $manager->getPosts();

        require('view/frontend/listPostsView.php');
    }

    public function post()
    {
        $manager = new PostManager;
        $post = $manager->getPost($_GET['id']);
        
        require('view/frontend/postView.php');
    }

    public function addComment($postId, $author, $comment)
    {   
        $manager = new CommentManager;
        $affectedLines = $manager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
}
