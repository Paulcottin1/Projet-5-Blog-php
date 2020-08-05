<?php
session_start();
require_once('vendor/autoload.php');
use App\controller\FrontendController;

$action = filter_input(INPUT_GET, 'action');
$getId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$getPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
$getImg = filter_input(INPUT_GET, 'img');
$getCommentId = filter_input(INPUT_GET, 'comment_id');

$postComment = filter_input(INPUT_POST, 'comment');
$postTitle = filter_input(INPUT_POST, 'title');
$postChapo = filter_input(INPUT_POST, 'chapo');
$postContent = filter_input(INPUT_POST, 'content');
$postEmail = filter_input(INPUT_POST, 'email');
$postSubject = filter_input(INPUT_POST, 'subject');
$postMessage = filter_input(INPUT_POST, 'message');
$postName = filter_input(INPUT_POST, 'name');
$postFirstName = filter_input(INPUT_POST, 'firstname');
$postPhone = filter_input(INPUT_POST, 'phone');
$postPassword = filter_input(INPUT_POST, 'password');
$postRole = filter_input(INPUT_POST, 'role');

if (isset($action)) {
    $controller = new FrontendController();

    if ($action == 'post') {
        if (isset($getId) && $getId > 0) {
            $controller->post($getId);
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($action == 'addComment') {
        $controller = new FrontendController();
        $controller->addComment($getId, $postComment);
    }
    elseif($action == 'formAddPost') {
        $controller->formAddPost();
    }
    elseif($action == 'addPost') {
        $controller = new FrontendController();
        $controller->addPost($postTitle, $postChapo, $postContent, $_FILES);
    }
    elseif($action == 'blog') {
        $controller = new FrontendController();
        if(isset($getPage)) {
            $controller->listPosts(8, $getPage);
        } else {
            $controller->listPosts(8, 0);
        }
    }
    elseif($action == 'sendMail') {
        $controller = new FrontendController();
        $controller->sendMail($postEmail, $postSubject, $postMessage, $postName);
    }
    elseif($action == 'contact') {
        $controller = new FrontendController();
        $controller->contact();
    }
    elseif($action == 'admin') {
        $controller = new FrontendController();
        $controller->admin();
    }
    elseif($action == 'adminPost') {
        $controller = new FrontendController();
        if(isset($getPage)) {
            $controller->adminPost(10, $getPage);
        } else {
            $controller->adminPost(10, 0);
        }
    }
    elseif($action == 'adminComment') {
        $controller = new FrontendController();
        $controller->adminComment();
    }
    elseif($action == 'publishComment') {
        $controller = new FrontendController();
        $controller->publishComment($getId);
    }
    elseif($action == 'delete' && isset($getId)) {
            $controller->delete($getId);
    }
    elseif($action == 'formUpdatePost') {
        $controller = new FrontendController();
        $controller->formUpdate($getId);
    }
    elseif($action == 'update') {
        $controller = new FrontendController();
        $controller->update($getId, $postTitle, $postChapo, $postContent, $_FILES, $getImg);
    }
    elseif($action == 'userForm') {
        $controller = new FrontendController();
        $controller->userForm();
    }
    elseif($action == 'addUser') {
        $controller = new FrontendController();
        $controller->addUser($postName, $postFirstName, $postEmail, $postPhone, $postPassword);
    }
    elseif($action == 'login') {
        $controller = new FrontendController();
        $controller->login();
    }
    elseif($action == 'connection') {
        $controller = new FrontendController();
        $controller->connection($postEmail, $postPassword);
    }
    elseif($action == 'logout') {
        $controller = new FrontendController();
        $controller->logout();
    }
    elseif($action == 'submitUpdate') {
            $controller = new FrontendController();
            $controller->updateComment($postComment, $getCommentId, $getId, $getPage);
    }
    elseif($action == 'userModeration') {
        $controller = new FrontendController();
        if(isset($getPage)) {
            $controller->userModeration($getPage);
        } else {
            $controller->userModeration(0);
        }
        
    }
    elseif($action == 'userUpdateRole') {
        $controller = new FrontendController();
        $controller->userUpdateRole($getId, $postRole);
    }
    elseif($action == 'account') {
        $controller = new FrontendController();
        $controller->account();
    }
    elseif($action == 'updateUser') {
        $controller = new FrontendController();
        $controller->updateUser($getId, $postName, $postFirstName, 
         $postEmail, $postPhone, $postPassword);
    }
} 
 else {
    $controller = new FrontendController();
    $controller->home();
} 
