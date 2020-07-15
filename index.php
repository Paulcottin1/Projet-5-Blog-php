<?php
session_start();
require_once('vendor/autoload.php');
use App\controller\FrontendController;

if (isset($_GET['action'])) {
    $controller = new FrontendController();

    if ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $controller->post($_GET['id']);
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        $controller = new FrontendController();
        $controller->addComment($_GET['id'], $_POST['comment']);
    }
    elseif($_GET['action'] == 'formAddPost') {
        $controller->formAddPost();
    }
    elseif($_GET['action'] == 'addPost') {
        $controller = new FrontendController();
        $controller->addPost($_POST['title'], $_POST['chapo'], $_POST['content'], $_FILES);
    }
    elseif($_GET['action'] == 'blog') {
        $controller = new FrontendController();
        $controller->listPosts(8);
    }
    elseif($_GET['action'] == 'sendMail') {
        $controller = new FrontendController();
        $controller->sendMail($_POST['email'], $_POST['subject'], $_POST['message'], $_POST['name']);
    }
    elseif($_GET['action'] == 'contact') {
        $controller = new FrontendController();
        $controller->contact();
    }
    elseif($_GET['action'] == 'admin') {
        $controller = new FrontendController();
        $controller->admin();
    }
    elseif($_GET['action'] == 'adminPost') {
        $controller = new FrontendController();
        $controller->adminPost(10);
    }
    elseif($_GET['action'] == 'adminComment') {
        $controller = new FrontendController();
        $controller->adminComment();
    }
    elseif($_GET['action'] == 'publishComment') {
        $controller = new FrontendController();
        $controller->publishComment($_GET['id']);
    }
    elseif($_GET['action'] == 'delete' && isset($_GET['id'])) {
            $controller->delete($_GET['id']);
    }
    elseif($_GET['action'] == 'formUpdatePost') {
        $controller = new FrontendController();
        $controller->formUpdate($_GET['id']);
    }
    elseif($_GET['action'] == 'update') {
        $controller = new FrontendController();
        $controller->update($_GET['id'], $_POST['title'], $_POST['chapo'], $_POST['content'], $_FILES, $_GET['img']);
    }
    elseif($_GET['action'] == 'userForm') {
        $controller = new FrontendController();
        $controller->userForm();
    }
    elseif($_GET['action'] == 'addUser') {
        $controller = new FrontendController();
        $controller->addUser($_POST['name'], $_POST['firstname'], $_POST['email'], $_POST['phone'], $_POST['password']);
    }
    elseif($_GET['action'] == 'login') {
        $controller = new FrontendController();
        $controller->login();
    }
    elseif($_GET['action'] == 'connection') {
        $controller = new FrontendController();
        $controller->connection($_POST['email'], $_POST['password']);
    }
    elseif($_GET['action'] == 'logout') {
        $controller = new FrontendController();
        $controller->logout();
    }
    elseif($_GET['action'] == 'submitUpdate') {
            $controller = new FrontendController();
            $controller->updateComment($_POST['comment'], $_GET['comment_id'], $_GET['id'], $_GET['page']);
    }
    elseif($_GET['action'] == 'userModeration') {
        $controller = new FrontendController();
        $controller->userModeration();
    }
    elseif($_GET['action'] == 'userUpdateRole') {
        $controller = new FrontendController();
        $controller->userUpdateRole($_GET['id'], $_POST['role']);
    }
    elseif($_GET['action'] == 'account') {
        $controller = new FrontendController();
        $controller->account();
    }
    elseif($_GET['action'] == 'updateUser') {
        $controller = new FrontendController();
        $controller->updateUser($_GET['id'], $_POST['name'], $_POST['firstname'], 
         $_POST['email'], $_POST['phone'], $_POST['password']);
    }
} 
 else {
    $controller = new FrontendController();
    $controller->home();
} 
