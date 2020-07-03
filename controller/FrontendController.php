<?php
namespace App\controller;
use App\manager\PostManager;
use App\manager\CommentManager;
use App\manager\UserManager;

Class FrontendController 
{

    public function home() 
    {
        $manager = new PostManager();
        $posts = $manager->getPosts(4);

        require('view/frontend/home.php');
    }

    public function listPosts($limite)
    {   
        $manager = new PostManager();
        $numberPages = ceil($manager->countPost() / $limite);
        $posts = $manager->getPosts($limite);
        $paging = '/blog';

        require('view/frontend/listPostsView.php');
        require('view/frontend/paging.php');
    }

    public function post()
    {
        $commentManager = new CommentManager();
        $manager = new PostManager();
        $post = $manager->getPost($_GET['id']);
        $paging = '/post/'.$post->getId(); 
        $numberPages = ceil($commentManager->countComment() / 10);
        
        require('view/frontend/postView.php');
        require('view/frontend/paging.php');
    }

    public function addComment()
    {   
        $manager = new CommentManager();
        $user = unserialize($_SESSION['user']);
        
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (
                !empty($user->getFirstname()) && !empty($user->getLastname()) && 
                !empty($user->getId()) && !empty($_POST['comment'])
            ) {
                $author = $user->getLastname() . ' ' . $user->getFirstname();
                $affectedLines = $manager->postComment($_GET['id'], $user->getId(), $author, $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: post/' . $_GET['id']);
        }
    }

    public function updateComment() 
    {
        $manager = new CommentManager();
        if(!empty($_POST['comment'])) {
            if(!empty($_GET['comment_id'])) {
                $affectedLines = $manager->updateComment($_GET['comment_id'], $_POST['comment']);
            } else {
                $_SESSION['message'] = 'Erreur : aucun identifiant de commentaire envoyé';
            }
            
        } else { 
            $_SESSION['message'] = 'Le champs commentaire n\'est pas rempli';
        }
        if ($affectedLines === false) {
            die('Impossible de modifier le commentaire !');
        } else {
           if(!empty($_GET['page'])) { 
                $page =  $_GET['page'];
            } else { 
                $page = 1; 
            }
            $_SESSION['message'] = 'Votre commmentaire a été modifié';
            header('Location: /post/' . $_GET['id']  . '/page/' . $page .'#comment');
        }
    }

    public function isAdmin()
    {
        if(!empty($_SESSION['user'])) {    
           $user = unserialize($_SESSION['user']);
           if($user->getRole() == 'admin') {
                return true;
           } else {
               return false;
           }
        } else {
            return false;
        }
    }

    public function adminPost($limite)
    {
        $manager = new PostManager();
        $numberPages = ceil($manager->countPost() / $limite);
        $posts = $manager->getPosts($limite);
        
        if($this->isAdmin() === true) {
            require('view/frontend/adminPost.php');
            require('view/frontend/paging.php');
        } else {
            $_SESSION['message'] = 'Vous ne pouvez pas accéder à cette page';
            header('Location: /accueil');
        }
    }

    public function adminComment()
     {
        $manager = new CommentManager();
        $comments = $manager->getCommentUnPublished();
        $paging = '/admin/moderation-commentaire' ;
        $numberPages = ceil($manager->countComment() / 10);
        
        if($this->isAdmin() === true) {
            require('view/frontend/adminComment.php');
            require('view/frontend/paging.php');
        } else {
            $_SESSION['message'] = 'Vous ne pouvez pas accéder à cette page';
            header('Location: /accueil');
        }
    }

    public function userModeration() 
    {
        $manager = new UserManager();
        $users = $manager->getUsers(10);

        require('view/frontend/userModeration.php');
    }

    public function userUpdateRole() 
    {
        $manager = new UserManager();
        if(!empty($_GET['id'])) {
            if(!empty($_POST['role'])) {
                $affectedLines = $manager->updateRole($_GET['id'], $_POST['role']);
            } else {
                $_SESSION['message'] = 'Veuillez sélectionner le nouveau rôle de l\'utilisateur';
            }
        } else {
            $_SESSION['message'] = 'Erreur : identifiant de l\'utilisateur non-trouvé';
        }
        if ($affectedLines === false) {
            die('Impossible de modifier le rôle de l\'utilisateur');
        } else {
            $_SESSION['message'] = 'Le rôle de l\'utilisateur a bien été modifié';
            header('Location: /admin/moderation-utilisateur');
        }
    }

    public function publishComment() {
        $manager = new CommentManager();
        $affectedLines = $manager->publishComment($_GET['id']);
        if ($affectedLines === false) {
            die('Impossible de valider le commentaire !');
        } else {
            $_SESSION['message'] = 'Le post a bien été mis à jour';
            header('Location: /admin/moderation-commentaire');
        } 
    }

    public function formAddPost()
    {
        if($this->isAdmin() === true) {
            require('view/frontend/formAddPost.php');
        } else {
            $_SESSION['message'] = 'Vous ne pouvez pas accéder à cette page';
            header('Location: /accueil');
        }
    }

    public function addPost()
    {
        if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES)) {
            $manager = new PostManager();
            $imageName = $this->verifImg();
            $affectedLines = $manager->addPost($_POST['title'], $_POST['content'], $imageName, $_POST['chapo']);             
            if ($affectedLines === false) {
                die('Impossible d\'ajouter le post !');
            } else {
                header('Location: /blog');
            }
        } else {
            $_SESSION['message'] = 'tous les champs ne sont pas remplis !';
            header('Location: /admin/ajout-post');
        }
    }

    public function delete($postId)
    {
        $manager = new PostManager();
        $manager->delete($postId);
        $_SESSION['message'] = 'Le post a bien été supprimé';
        header('Location: /admin');
    }

    public function formUpdate($postId)
    {
        $manager = new PostManager();
        $post = $manager->getPost($postId);

        if($this->isAdmin() === true) {
            require('view/frontend/updatePost.php');
        } else {
            $_SESSION['message'] = 'Vous ne pouvez pas accéder à cette page';
            header('Location: index.php');
        }
    }

    public function update()
    {
        $manager = new PostManager();
        if(!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content'])) {
            if(isset($_GET['id'])) {
                if(!empty($_FILES)) {
                    $imageName = $this->verifImg();
                    $affectedLines = $manager->update(
                        $_GET['id'], $_POST['title'], $_POST['chapo'], $_POST['content'], $imageName
                    );
                } else {
                    $affectedLines = $manager->update(
                        $_GET['id'], $_POST['title'], $_POST['chapo'], $_POST['content'], $_GET['img']
                    );
                }
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        } else {
            echo 'Veuillez remplir tous les champs';
        }                                  
        if ($affectedLines === false) {
            die('Impossible de modifier le post !');
        } else {
            if(!empty($_FILES)) {
                unlink('./public/image/'.$_GET['img']);
            }
            $_SESSION['message'] = 'Le post a bien été mis à jour';
            header('Location: admin');
        } 
    }

    public function userForm()
    {

        require('view/frontend/userForm.php');
    }

    public function addUser()
    {
        if(
            !empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['email']) &&
            !empty($_POST['password']) && !empty($_POST['phone'])
        ) {
            $manager = new UserManager();
            $affectedLines = $manager->addUser($_POST['firstname'], $_POST['name'],
            $_POST['email'], md5($_POST['password']), $_POST['phone']);

            if ($affectedLines === false) {
                die('Impossible de créer votre compte');
            } else {
                $_SESSION['message'] = 'Votre compte a bien été créer, vous pouvez vous connecter';
                header('Location: /connexion');
            }
    
        } else {
            $_SESSION['message'] = 'Tous les champs ne sont pas remplis';
            header('Location: /creation-compte');
        }
    }

    public function login()
     {
        require('view/frontend/login.php');
    }

    public function connection()
     {
        $manager = new UserManager();
        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            if($manager->connection($_POST['email'], md5($_POST['password'])) === false ) {
                $_SESSION['message'] = 'l\'email ou le mot de passe n\'est pas correct';
                header('Location: connexion');
            } else {
                $user = $manager->connection($_POST['email'], md5($_POST['password']));
                $_SESSION['user'] = serialize($user);
                header('Location: accueil');
            } 
        } else {
            $_SESSION['message'] = 'Tous les champs ne sont pas remplis';
            header('Location: connexion');
        }
    }

    public function logout()
     {
        unset($_SESSION['user']);
        $this->home();
    }

    public function contact()
    {
        require('view/frontend/contact.php');
    }

    public function verifImg()
     {
        define('TARGET', './public/image/');    // Repertoire cible
        define('MAX_SIZE', 100000);    // Taille max en octets du fichier
        define('WIDTH_MAX', 5000);    // Largeur max de l'image en pixels
        define('HEIGHT_MAX', 5000);    // Hauteur max de l'image en pixels
        
        $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
        $infosImg = array();
        $imageName = '';

        $infosImg = getimagesize($_FILES['file']['tmp_name']); 
        $extension  = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        if(!in_array(strtolower($extension),$tabExt)) {
            echo 'L\'extension du fichier est incorrecte !';
        }
        elseif($infosImg[2] < 1 && $infosImg[2] > 14) {
            echo 'Le fichier à uploader n\'est pas une image !';
        }
        elseif(($infosImg[0] > WIDTH_MAX) && ($infosImg[1] > HEIGHT_MAX) && (filesize($_FILES['file']['tmp_name']) > MAX_SIZE)) {
            echo 'Erreur dans les dimensions de l\'image !';
        }
        elseif(!isset($_FILES['file']['error']) && UPLOAD_ERR_OK != $_FILES['file']['error']) {
            echo 'Une erreur interne a empêché l\'uplaod de l\'image';
        } else {
            $imageName = md5(uniqid()) .'.'. $extension;
            if(!move_uploaded_file($_FILES['file']['tmp_name'], TARGET.$imageName)) {
                echo 'Problème lors de l\'upload !';
            }         
        }
        return $imageName;
    }

    public function account()
    {     
        if(!empty($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            require('view/frontend/account.php');
        } else {
            $_SESSION['message'] = 'Aucun utilisateur connecté';
            header('Location: /accueil');
        } 
    }

    public function updateUser()
    {
        $manager = new UserManager();
        if(!empty($_GET['id'])) {
            if(
                !empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['email']) 
                && !empty($_POST['password']) && !empty($_POST['phone'])
            ) {
                $affectedLines = $manager->update(
                    $_GET['id'], $_POST['name'], $_POST['firstname'], 
                    $_POST['phone'], $_POST['email'], md5($_POST['password'])
                );
            } else {
                $_SESSION['message'] = 'Tous les champs ne sont pas remplis';
                header('Location: mon-compte');
            }
        } else {
            $_SESSION['message'] = 'Aucun utilisateur trouvé';
            header('Location: mon-compte');
        }
        
        if ($affectedLines === false) {
            die('Impossible de modifier les informations de votre compte');
        } else {
            $this->connection();
            $_SESSION['message'] = 'Votre compte a bien été modifié !';
            header('Location: mon-compte');
        }
    }
}
