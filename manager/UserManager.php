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

        while($data = $req->fetch()) {
            $user = $this->getUser($data['id']);
            $users[] = $user;
        }
        
        return $users;
    }

    public function getUser($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE id = :id');
        $req->bindValue(':id', $userId);
        $req->execute();
        $data = $req->fetch();
        $user = new User();
        
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

    public function updateRole($id, $role)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE user SET role = :role WHERE id = :id');
        $req->bindValue(':role', $role);
        $req->bindValue(':id', $id);
        $affectedLines = $req->execute();

        return $affectedLines;
    }

    public function addUser($firstname, $name, $email, $password, $telephone)
    {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'INSERT INTO user(firstname, name_user, creation_date, email, user_password, phone)
            VALUES(:firstname, :username, NOW(), :email, :userpassword, :telephone)'
        );
        $req->bindValue(':firstname', $firstname);
        $req->bindValue(':username', $name);
        $req->bindValue(':email', $email);
        $req->bindValue(':userpassword', $password);
        $req->bindValue(':telephone', $telephone);
        $affectedLines = $req->execute();

        return $affectedLines;
    }


    public function connection($email, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE email = :email AND user_password = :userpassword');
        $req->bindValue(':email', $email);
        $req->bindValue(':userpassword', $password);
        $req->execute();
        $data = $req->fetch();

        if($data != false) {
            $user = new User();
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

    public function update($id, $name, $firstname, $phone, $email, $password)
     {
        $db = $this->dbConnect();
        $req = $db->prepare(
            'UPDATE user SET firstname= :firstname, name_user= :username,
            email= :email, phone= :phone, user_password= :userpassword WHERE id = :id'
        );

        $req->bindValue(':firstname', $firstname);
        $req->bindValue(':username', $name);
        $req->bindValue(':email', $email);
        $req->bindValue(':phone', $phone);
        $req->bindValue(':userpassword', $password);
        $req->bindValue(':id', $id);
        $affectedLines = $req->execute();

        return $affectedLines;
    }
}
