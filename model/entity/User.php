<?php

Class User {

    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $phone;
    protected $password;
    protected $role;


    // Setteur
    public function setId($id) {
        $this->id = $id;
    }

    
    public function setFirstname($firstname) {

        $this->firstname = $firstname;
    }

    public function setLastname($lastname) {

        $this->lastname = $lastname;
        
    }

    public function setEmail($email) {
        $this->email = $email;   
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    // Getteur

    public function getId() {
        return $this->id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->id;
    }
}