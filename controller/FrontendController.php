<?php
namespace App\controller;
use App\manager\PostManager;
use App\manager\CommentManager;

Class FrontendController {

    public function home() {
        $manager = new PostManager;
        $posts = $manager->getPosts(4);

        require('view/frontend/home.php');
    }

    public function listPosts($limite)
    {   
        $manager = new PostManager;
        $numberPages = ceil($manager->countPost() / $limite);
        $posts = $manager->getPosts($limite);

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
        } else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function formAddPost()
    {
        require('view/frontend/formAddPost.php');
    }

    public function addPost($title, $content, $img)
    {
        if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES)) {
            $manager = new PostManager;
            $affectedLines = $manager->addPost($title, $content, $img);

            if ($affectedLines === false) {
                die('Impossible d\'ajouter le post !');
            } else {
                header('Location: index.php?action=listPosts');
            }
        } else {
            echo 'Erreur : tous les champs ne sont pas remplis !';
        }
    }

    public function contact()
    {
        require('view/frontend/contact.php');
    }
}
