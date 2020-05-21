<?php
namespace App\entity;

Class Post {     
    /**
     * @var int
     */
    protected $id;  

    /**
     * @var string
     */
    protected $chapo; 

    /**
     * @var string
     */
    protected $title;  

    /**
     * @var string
     */
    protected $content;
    
    /**
     * @var string
     */
    protected $img;

    /**
     * @var int
     */
    protected $categoryId;

    /**
     * @var int
     */
    protected $userId;
    
    /**
     *
     * @var array
     */
    protected $comments = [];

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
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @param  string $chapo
     * @return object
     */
    public function setChapo(string $chapo) : object
    {
        $this->chapo = $chapo;
        return $this;
    } 

    /**
     * @return string
     */
    public function getChapo() : string
    {
        return $this->chapo;
    } 

    /**
     * @param  string $title
     * @return object
     */
    public function setTitle(string $title) : object
    {
        $this->title = $title;
        return $this;
    }  

    /**
     * @return string
     */
    public function getTitle() : string 
    {
        return $this->title;
    }  

    /**
     * @param  string $content
     * @return object
     */
    public function setContent(string $content) : object
    {
        $this->content = $content;
        return $this;
    } 

    /**
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    } 
    
    /**
     * @param  string $img
     * @return object
     */
    public function setImg( string $img) : object 
    {
        $this->img = $img;
        return $this;
    }
    
    /**
     * @return string
     */
    public function getImg() : string 
    {
        return $this->img;
    }

    /**
     * @param  int $categoryId
     * @return object
     */
    public function setCategoryId(int $categoryId) : object
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId() : int
    {
        return $this->categoryId;
    }   

    /**
     * @param  int $userId
     * @return object
     */
    public function setUserId(int $userId) : object
    {
        $this->userId = $userId;
        return $this;
    }   
     
    /**
     * @return int
     */
    public function getUserId() : int
    {
        return $this->userId;
    }
    
    /**
     * @param  array $comments
     * @return object
     */
    public function setComments(array $comments) : object 
    {
        $this->comments = $comments;
        return $this;
    }
    
    /**
     * @return array
     */
    public function getComments() : array
    {
        return $this->comments;
    }

    
}

