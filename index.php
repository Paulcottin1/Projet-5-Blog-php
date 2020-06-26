<?php
session_start();
require_once('vendor/autoload.php');
use App\controller\FrontendController;

if (isset($_GET['action'])) {
    $controller = new FrontendController();

    if ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $controller->post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        $controller = new FrontendController();
        $controller->addComment();
    }
    elseif($_GET['action'] == 'formAddPost'){
        $controller->formAddPost();
    }
    elseif($_GET['action'] == 'addPost') {
        $controller = new FrontendController();
        $controller->addPost();
    }
    elseif($_GET['action'] == 'blog') {
        $controller = new FrontendController();
        $controller->listPosts(8);
    }
    elseif($_GET['action'] == 'contact'){
        $controller = new FrontendController();
        $controller->contact();

        if(isset($_POST['email'])){
            if(!empty($_POST['name']) && !empty($_POST['subject']) && !empty($_POST['message'])) {
            $toEmail = 'cottin.paul45@gmail.com';
            $EmailSubject = 'Blog contact form'; 
            $mailheader = "From: ".$_POST["email"]."\r\n"; 
            $mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
            $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
            $MESSAGE_BODY = "Name: ".$_POST["name"].""; 
            $MESSAGE_BODY .= "Email: ".$_POST["email"]."";
            $MESSAGE_BODY .= "Sujet: ".$_POST["subject"]."";  
            $MESSAGE_BODY .= "Message: ".nl2br($_POST["message"]).""; 
            mail($toEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 

            echo 'Votre message a bien été envoyé';
            } else {
                echo 'Veuillez remplir tous les champs';
            }
        }
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
        $controller->publishComment();
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
        $controller->update();
    }
    elseif($_GET['action'] == 'userForm') {
        $controller = new FrontendController();
        $controller->userForm();
    }
    elseif($_GET['action'] == 'addUser') {
        $controller = new FrontendController();
        $controller->addUser();
    }
    elseif($_GET['action'] == 'login') {
        $controller = new FrontendController();
        $controller->login();
    }
    elseif($_GET['action'] == 'connection') {
        $controller = new FrontendController();
        $controller->connection();
    }
    elseif($_GET['action'] == 'logout') {
        $controller = new FrontendController();
        $controller->logout();
    }
    elseif($_GET['action'] == 'submitUpdate') {
            $controller = new FrontendController();
            $controller->updateComment();
    }
    elseif($_GET['action'] == 'userModeration') {
        $controller = new FrontendController();
        $controller->userModeration();
    }
    elseif($_GET['action'] == 'userUpdateRole') {
        $controller = new FrontendController();
        $controller->userUpdateRole();
    }
    elseif($_GET['action'] == 'account') {
        $controller = new FrontendController();
        $controller->account();
    }
    elseif($_GET['action'] == 'updateUser') {
        $controller = new FrontendController();
        $controller->updateUser();
    }
} 
 else {
    $controller = new FrontendController();
    $controller->home();
} 
