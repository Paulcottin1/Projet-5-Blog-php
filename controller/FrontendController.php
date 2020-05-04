<?php

Class FrontendController {

    public function __construct() {
        $this->autoloadEntity();
        $this->autoloadManager();
    }

    public function autoloadEntity()
    {
        spl_autoload_register(function ($class_name) {
            include 'model/entity/'.$class_name . '.php';
        });
    }

    public function autoloadManager()
    {
        spl_autoload_register(function ($class_name) {
            include 'model/manager/'.$class_name . '.php';
        });
    }

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
