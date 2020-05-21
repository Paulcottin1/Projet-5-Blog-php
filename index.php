<?php
require_once('vendor/autoload.php');
use App\controller\FrontendController;

if (isset($_GET['action'])) {
    $controller = new FrontendController;

    if ($_GET['action'] == 'listPosts') {
        $controller->listPosts();
    }
    elseif ($_GET['action'] == 'post') {
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
        define('TARGET', './public/image/');    // Repertoire cible
        define('MAX_SIZE', 100000);    // Taille max en octets du fichier
        define('WIDTH_MAX', 2000);    // Largeur max de l'image en pixels
        define('HEIGHT_MAX', 2000);    // Hauteur max de l'image en pixels
        
        $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
        $infosImg = array();
        
        $imageName = '';

        $infosImg = getimagesize($_FILES['file']['tmp_name']); 
        $extension  = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

        if(!in_array(strtolower($extension),$tabExt)) {
            echo 'L\'extension du fichier est incorrecte !';
        }
        elseif($infosImg[2] < 1 && $infosImg[2] > 14){
            echo 'Le fichier à uploader n\'est pas une image !';
        }
        elseif(($infosImg[0] > WIDTH_MAX) && ($infosImg[1] > HEIGHT_MAX) && (filesize($_FILES['file']['tmp_name']) > MAX_SIZE)){
            echo 'Erreur dans les dimensions de l\'image !';
        }
        elseif(!isset($_FILES['file']['error']) && UPLOAD_ERR_OK != $_FILES['file']['error']){
            echo 'Une erreur interne a empêché l\'uplaod de l\'image';
        } else {
            $imageName = md5(uniqid()) .'.'. $extension;
            if(!move_uploaded_file($_FILES['file']['tmp_name'], TARGET.$imageName)){
                echo 'Problème lors de l\'upload !';
            }
            $controller->addPost($_POST['title'], $_POST['content'], $imageName);             
        }
    }
} else {
    $controller = new FrontendController;
    $controller->listPosts();
}
