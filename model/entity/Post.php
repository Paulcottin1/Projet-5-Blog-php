<?php

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
     * @var int
     */
    protected $categoryId;

    /**
     * @var int
     */
    protected $userId; 

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
}

