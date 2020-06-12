<?php
namespace App\manager;
use App\entity\User;

Class UserManager extends AbstractManager {

    public function addUser($firstname, $name, $email, $password, $telephone) {

        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO user(firstname, name_user, creation_date, email, user_password, phone) VALUES(?, ?, NOW(), ?, ?, ?)');
        $affectedLines = $comments->execute(array($firstname, $name, $email, $password, $telephone));

        return $affectedLines;
    }


    public function connection($email, $password) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE email = ? AND user_password = ?');
        $req->execute(array($email, $password));
        $data = $req->fetch();
        
        if($data != false) {
            $user = new User;
            $user
            ->setId($data['id'])
            ->setFirstName($data['firstname'])
            ->setLastname($data['name_user'])
            ->setEmail($data['email'])
            ->setPhone($data['phone'])
            ->setPassword($data['user_password']);
    
            return $user;
        }
        else {
            return false;
        }
    }
}
