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
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $controller->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
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
} else {
    $controller = new FrontendController();
    $controller->home();
}
