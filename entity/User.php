<?php
namespace App\entity;

Class User {    
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string ('USER','ADMINISTRATOR')
     */
    protected $role;    

    /**
     * @param  int $id
     * @return object
     */
    public function setId(int $id) : object
    {
        $this->id = $id;
        return $this;
    }  

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }  

    /**
     * @param  string $firstname
     * @return object
     */
    public function setFirstname(string $firstname) : object
    {
        $this->firstname = $firstname;
        return $this;
    } 

    /**
     * @return string
     */
    public function getFirstname() : string
    {
        return $this->firstname;
    } 

    /**
     * @param  string $lastname
     * @return object
     */
    public function setLastname(string $lastname) : object
    {
        $this->lastname = $lastname;
        return $this;
    } 

    /**
     * @return string
     */
    public function getLastname() : string
    {
        return $this->lastname;
    } 

    /**
     * @param  string $email
     * @return object
     */
    public function setEmail(string $email) : object
    {
        $this->email = $email;
        return $this;   
    } 

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }    

    /**
     * @param  string $phone
     * @return object
     */
    public function setPhone(string $phone) : object
    {
        $this->phone = $phone;
        return $this;
    } 

    /**
     * @return string
     */
    public function getPhone() : string
    {
        return $this->phone;
    } 

    /**
     * @param  string $password
     * @return object
     */
    public function setPassword(string $password) : object
    {
        $this->password = $password;
        return $this;
    }  

    /**
     * @return string
     */
    public function getPassword() : string
    {
        return $this->password;
    }   

    /**
     * @param  string $role
     * @return object
     */
    public function setRole(string $role) : object
    {
        $this->role = $role;
        return $this;
    }   
     
    /**
     * @return string
     */
    public function getRole() : string 
    {
        return $this->role;
    }
}
