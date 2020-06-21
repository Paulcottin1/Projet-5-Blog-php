<?php
namespace App\manager;
use App\entity\User;

Class UserManager extends AbstractManager {

    public function getUsers($limite)
    {
        if(!empty($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        
        $debut = ($page - 1) * $limite;
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM user ORDER BY creation_date DESC LIMIT '.$limite.' OFFSET '.$debut);
        $users = [];

        while($data = $req->fetch())
        {
            $user = $this->getUser($data['id']);
            $users[] = $user;
        }
        
        return $users;
    }

    public function getUser($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE id = ?');
        $req->execute(array($userId));
        $data = $req->fetch();
        $user = new User;
        
        $user
        ->setId($data['id'])
        ->setFirstname($data['firstname'])
        ->setLastname($data['name_user'])
        ->setEmail($data['email'])
        ->setPhone($data['phone'])
        ->setRole($data['role'])
        ->setPassword($data['user_password']);
        
        return $user;
    }

    public function updateRole($id, $role) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE user SET role = ? WHERE id = '.$id);
        $req->bindValue(1, $role);
        $affectedLines = $req->execute();

        return $affectedLines;
    }

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
            ->setPassword($data['user_password'])
            ->setRole($data['role']);
    
            return $user;
        }
        else {
            return false;
        }
    }

    public function update($id, $name, $firstname, $phone, $email, $password) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE user SET firstname= ?, name_user= ?, email= ?, phone= ?, user_password= ? WHERE id = '.$id);
        $req->bindValue(1, $firstname);
        $req->bindValue(2, $name);
        $req->bindValue(3, $email);
        $req->bindValue(4, $phone);
        $req->bindValue(5, $password);
        $affectedLines = $req->execute();

        return $affectedLines;
    }
}
