<?php

Class User {

    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $phone;
    protected $password;
    protected $role;

    public function __construct(array $data){
        $this->dbConnect();
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
      foreach ($donnees as $key => $value)
      {
        $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
          $this->$method($value);
          
        }
      }
    }

    // Setteur
    public function setId($id) {
        $id = (int) $id;

        if($id > 0) {
            $this->_id = $id;
        }
    }

    
    public function setFirstname($firstname) {
        if($firstname = (string)$firstname)
        {
            $this->_firstname = $firstname;
        }
        
    }

    public function setLastname($lastname) {
        if($lastname = (string)$lastname)
        {
            $this->$lastname = $lastname;
        }
        
    }

    public function setEmail($email) {
        if($email = (string)$email)
        {
            $this->$email = $email;
        }
        
    }

    public function setPhone($phone) {
        if($phone = (string)$phone)
        {
            $this->$phone = $phone;
        }
        
    }

    public function setPassword($password) {
        if($password = (string)$password)
        {
            $this->$password = $password;
        }
        
    }

    public function setRole($role) {
        if($role = (string)$role)
        {
            $this->$role = $role;
        }
        
    }

    //Getteur

    public function getId() {
        return $this->_id;
    }

    public function getFirstname() {
        return $this->_firstname;
    }

    public function getLastname() {
        return $this->_lastname;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function getPhone() {
        return $this->_phone;
    }

    public function getPassword() {
        return $this->_password;
    }

    public function getRole() {
        return $this->_id;
    }

    // Connexion bdd
    function dbConnect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=projet5-blog;charset=utf8', 'root', 'root');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

}