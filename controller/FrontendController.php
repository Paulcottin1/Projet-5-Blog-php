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
        $posts = $manager->getPosts(4, 0);
        $template = 'home';
        $title = 'Accueil';
        require('view/frontend/template.php');
    }
    
    /**
     * Render blog page
     * @param  int $limite
     * @return
     */
    public function listPosts($limite, $page)
    {   
        $manager = new PostManager();
        $numberPages = ceil($manager->countPost() / $limite);
        $posts = $manager->getPosts($limite, $page);
        $paging = '/blog';
        $title = 'Mon blog';
        $template = 'listPostsView';
        require('view/frontend/template.php');
    }
    
    /**
     * Render single post page
     * @param  int $id
     * @return
     */
    public function post($id)
    {
        $user = unserialize($_SESSION['user']);
        $commentManager = new CommentManager();
        $manager = new PostManager();
        $userManager = new UserManager;
        $post = $manager->getPost($id);
        $title = htmlspecialchars($post->getTitle());
        $template = 'postView';
        require('view/frontend/template.php');
    }
    
    /**
     * add comment in post
     * @param  int $id
     * @param  string $comment
     * @return
     */
    public function addComment($id, $comment)
    {   
        $manager = new CommentManager();
        $user = unserialize($_SESSION['user']);
        
        if (!empty($id) && $id > 0) {
            if (
                !empty($user->getFirstname()) && !empty($user->getLastname()) && 
                !empty($user->getId()) && !empty($comment)
            ) {
                $affectedLines = $manager->postComment($id, $user->getId(), $comment);
            }
            else {
                header('Location: post/' . $id);
                $_SESSION['message'] = 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            header('Location: post/' . $id);
            $_SESSION['message'] = 'Erreur : aucun identifiant de billet envoyé';
        }
        if ($affectedLines === false) {
            header('Location: post/' . $id);
            $_SESSION['message'] = 'Impossible d\'ajouter le commentaire !';
        } else {
            header('Location: post/' . $id);
        }
    }
    
    /**
     * update comment
     * @param  string $comment
     * @param  int $commentId
     * @param  int $id
     * @param  int $pageNb
     * @return
     */
    public function updateComment($comment, $commentId, $id, $pageNb) 
    {
        $manager = new CommentManager();
        if(!empty($comment)) {
            if(!empty($commentId)) {
                $affectedLines = $manager->updateComment($commentId, $comment);
            } else {
                $_SESSION['message'] = 'Erreur : aucun identifiant de commentaire envoyé';
            }
            
        } else { 
            $_SESSION['message'] = 'Le champs commentaire n\'est pas rempli';
        }
        if ($affectedLines === false) {
            header('Location: post/' . $id);
            $_SESSION['message'] = 'Impossible de modifier le commentaire !';
        } else {
           if(!empty($pageNb)) { 
                $page =  $pageNb;
            } else { 
                $page = 1; 
            }
            $_SESSION['message'] = 'Votre commmentaire a été modifié';
            header('Location: /post/' . $id  . '/page/' . $page .'#comment');
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
    
    public function admin()
    {   
        if($this->isAdmin() === true) {
            $template = 'admin';
            $title = 'Administration';
            require('view/frontend/template.php');
        } else {
            $_SESSION['message'] = 'Vous ne pouvez pas accéder à cette page';
            header('Location: /accueil');
        }
    }

    /**
     * Render admin post page
     * @param  int $limite
     * @return
     */
    public function adminPost($limite, $page)
    {
        $manager = new PostManager();
        $numberPages = ceil($manager->countPost() / $limite);
        $posts = $manager->getPosts($limite, $page);
        $paging = '/admin/modification-post' ;
        
        if($this->isAdmin() === true) {
            $template = 'adminPost';
            $title = 'Gestion des blog posts';
            require('view/frontend/template.php');
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
        $title = 'Modération des commentaires'; 
        
        if($this->isAdmin() === true) {
            $template = 'adminComment';
            require('view/frontend/template.php');
        } else {
            $_SESSION['message'] = 'Vous ne pouvez pas accéder à cette page';
            header('Location: /accueil');
        }
    }

    public function userModeration($page) 
    {
        $manager = new UserManager();
        $users = $manager->getUsers(10, $page);
        $template = 'userModeration';
        $title = 'Modération des utilisateurs';
        require('view/frontend/template.php');
    }
    
    /**
     * Update user role - admin or user
     * @param  int $id
     * @param  string $role
     * @return
     */
    public function userUpdateRole($id, $role) 
    {
        $manager = new UserManager();
        if(!empty($id)) {
            if(!empty($role)) {
                $affectedLines = $manager->updateRole($id, $role);
            } else {
                $_SESSION['message'] = 'Veuillez sélectionner le nouveau rôle de l\'utilisateur';
            }
        } else {
            $_SESSION['message'] = 'Erreur : identifiant de l\'utilisateur non-trouvé';
        }
        if ($affectedLines === false) {
            header('Location: /admin/moderation-utilisateur');
            $_SESSION['message'] = 'Impossible de modifier le rôle de l\'utilisateur';
        } else {
            $_SESSION['message'] = 'Le rôle de l\'utilisateur a bien été modifié';
            header('Location: /admin/moderation-utilisateur');
        }
    }
    
    /**
     * posting comment after validation
     * @param  int $id
     * @return
     */
    public function publishComment($id) {
        $manager = new CommentManager();
        $affectedLines = $manager->publishComment($id);
        if ($affectedLines === false) {
            header('Location: /admin/moderation-commentaire');
            $_SESSION['message'] = 'Impossible de valider le commentaire !';
        } else {
            $_SESSION['message'] = 'Le post a bien été mis à jour';
            header('Location: /admin/moderation-commentaire');
        } 
    }

    public function formAddPost()
    {
        if($this->isAdmin() === true) {
            $template = 'formAddPost';
            $title = 'Ajouter un blog post';
            require('view/frontend/template.php');
        } else {
            $_SESSION['message'] = 'Vous ne pouvez pas accéder à cette page';
            header('Location: /accueil');
        }
    }
    
    /**
     * Create new post
     * @param  string $title
     * @param  string $chapo
     * @param  string $content
     * @param  array $file
     * @return
     */
    public function addPost($title, $chapo ,$content, $file)
    {
        if(!empty($title) && !empty($content) && !empty($file)) {
            $manager = new PostManager();
            $imageName = $this->verifImg($file);
            $affectedLines = $manager->addPost($title, $content, $imageName, $chapo);             
            if ($affectedLines === false) {
                header('Location: /admin/ajout-post');
                $_SESSION['message'] = 'Impossible d\'ajouter le post !';
            } else {
                header('Location: /blog');
            }
        } else {
            $_SESSION['message'] = 'tous les champs ne sont pas remplis !';
            header('Location: /admin/ajout-post');
        }
    }
    
    /**
     * delete post
     * @param  int $postId
     * @return
     */
    public function delete($postId)
    {
        $manager = new PostManager();
        $manager->delete($postId);
        $_SESSION['message'] = 'Le post a bien été supprimé';
        header('Location: /admin/modification-post');
    }
    
    /**
     * Render update form page
     * @param  int $postId
     * @return
     */
    public function formUpdate($postId)
    {
        $manager = new PostManager();
        $post = $manager->getPost($postId);

        if($this->isAdmin() === true) {
            $template = 'updatePost';
            $title = 'Modifier un blog post';
            require('view/frontend/template.php');
        } else {
            $_SESSION['message'] = 'Vous ne pouvez pas accéder à cette page';
            header('Location: index.php');
        }
    }
    
    /**
     * update post
     * @param  int $id
     * @param  string $title
     * @param  string $chapo
     * @param  string $content
     * @param  array $file
     * @param  string $img
     * @return
     */
    public function update($id ,$title, $chapo ,$content, $file, $img)
    {
        $manager = new PostManager();
        if(!empty($title) && !empty($content) && !empty($chapo)) {
            if(isset($id)) {
                if($file['file']['size'] > 0) {
                    $imageName = $this->verifImg($file);
                    $affectedLines = $manager->update(
                        $id, $title, $chapo, $content, $imageName
                    );
                } else {
                    $affectedLines = $manager->update(
                    $id, $title, $chapo, $content, $img
                    );
                }
            } else {
                header('Location: /admin/modification-post');
                $_SESSION['message'] = 'Erreur : aucun identifiant de billet envoyé';
            }
        } else {
            header('Location: /admin/modification-post');
            $_SESSION['message'] = 'Veuillez remplir tous les champs';
        }                                  
        if ($affectedLines === false) {
            header('Location: /admin/modification-post');
            $_SESSION['message'] = 'Impossible de modifier le post !';
        } else {
            if($file['file']['size'] > 0) {
                unlink('./public/image/'.$img);
            }
            $_SESSION['message'] = 'Le post a bien été mis à jour';
            header('Location: /admin/modification-post');
        } 
    }

    public function userForm()
    {
        $template = 'userForm';
        $title = 'Création de compte';
        require('view/frontend/template.php');
    }
    
    /**
     * add new user
     * @param  string $name
     * @param  string $firstname
     * @param  string $email
     * @param  string $phone
     * @param  string $password
     * @return
     */
    public function addUser($name, $firstname, $email, $phone, $password)
    {
        if(
            !empty($name) && !empty($firstname) && !empty($email) &&
            !empty($password) && !empty($phone)
        ) {
            $manager = new UserManager();
            $affectedLines = $manager->addUser($firstname, $name,
            $email, md5($password), $phone);

            if ($affectedLines === false) {
                $_SESSION['message'] = 'Impossible de créer votre compte';
                header('Location: /creation-compte');
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
        $template = 'login';
        $title = 'Connexion';
        require('view/frontend/template.php');
    }
    
    /**
     * connection
     * @param  string $email
     * @param  string $password
     * @return
     */
    public function connection($email, $password)
     {
        $manager = new UserManager();
        if(!empty($email) && !empty($password)) {
            if(empty($manager->connection($email, md5($password)))) {
                $_SESSION['message'] = 'l\'email ou le mot de passe n\'est pas correct';
                header('Location: connexion');
            } else {
                $user = $manager->connection($email, md5($password));
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
    
    /**
     * send email and render contact page 
     * @param  string $email
     * @param  string $subject
     * @param  string $message
     * @param  string $name
     * @return
     */
    public function sendMail($email, $subject, $message, $name)
    {
        if(isset($email)) {
            if(!empty($name) && !empty($subject) && !empty($message)) {
            $toEmail = 'cottin.paul45@gmail.com';
            $EmailSubject = 'Blog contact form'; 
            $mailheader = "From: ".$email."\r\n"; 
            $mailheader .= "Reply-To: ".$email."\r\n"; 
            $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
            $MESSAGE_BODY = "Name: ".$name.""; 
            $MESSAGE_BODY .= "Email: ".$email."";
            $MESSAGE_BODY .= "Sujet: ".$subject."";  
            $MESSAGE_BODY .= "Message: ".nl2br($message).""; 
            mail($toEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 

            $_SESSION['message'] = 'Votre message a bien été envoyé';
            } else {
                $_SESSION['message'] = 'Veuillez remplir tous les champs';
            }
        }
        header('Location: /contact');
    }

    public function contact()
    {
        $template = 'contact';
        $title = 'Contactez moi';
        require('view/frontend/template.php');
    }
    
    /**
     * Image verification for post
     * @param  array $file
     * @return $imageName
     */
    public function verifImg($file)
     {
        define('TARGET', './public/image/');    // Repertoire cible
        define('MAX_SIZE', 100000);    // Taille max en octets du fichier
        define('WIDTH_MAX', 5000);    // Largeur max de l'image en pixels
        define('HEIGHT_MAX', 5000);    // Hauteur max de l'image en pixels
        
        $tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
        $infosImg = array();
        $imageName = '';

        $infosImg = getimagesize($file['file']['tmp_name']); 
        $extension  = pathinfo($file['file']['name'], PATHINFO_EXTENSION);

        if(!in_array(strtolower($extension),$tabExt)) {
            print 'L\'extension du fichier est incorrecte !';
        }
        elseif($infosImg[2] < 1 && $infosImg[2] > 14) {
            print 'Le fichier à uploader n\'est pas une image !';
        }
        elseif(($infosImg[0] > WIDTH_MAX) && ($infosImg[1] > HEIGHT_MAX) && (filesize($file['file']['tmp_name']) > MAX_SIZE)) {
            print 'Erreur dans les dimensions de l\'image !';
        }
        elseif(!isset($file['file']['error']) && UPLOAD_ERR_OK != $file['file']['error']) {
            print 'Une erreur interne a empêché l\'uplaod de l\'image';
        } else {
            $imageName = md5(uniqid()) .'.'. $extension;
            if(!move_uploaded_file($file['file']['tmp_name'], TARGET.$imageName)) {
                print 'Problème lors de l\'upload !';
            }         
        }
        return $imageName;
    }

    public function account()
    {     
        if(!empty($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            $template = 'account';
            $title = 'Mon compte';
            require('view/frontend/template.php');
        } else {
            $_SESSION['message'] = 'Aucun utilisateur connecté';
            header('Location: /accueil');
        } 
    }
    
    /**
     * update user informations
     * @param  int $id
     * @param  string $name
     * @param  string $firstname
     * @param  string $email
     * @param  string $phone
     * @param  string $password
     * @return
     */
    public function updateUser($id, $name, $firstname, $email, $phone, $password)
    {
        $manager = new UserManager();
        if(!empty($id)) {
            if(
                !empty($name) && !empty($firstname) && !empty($email) 
                && !empty($password) && !empty($phone)
            ) {
                $affectedLines = $manager->update(
                    $id, $name, $firstname, 
                    $phone, $email, md5($password)
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
            $this->connection($email, $password);
            $_SESSION['message'] = 'Votre compte a bien été modifié !';
            header('Location: mon-compte');
        }
    }
}
