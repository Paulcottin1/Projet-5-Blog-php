<?php
namespace App\entity;

Class Comment {    
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var int
     */
    protected $postId;

    /**
     * @var string
     */
    protected $author;

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
    public function getId() : int
    {
        return $this->id;
    }  

    /**
     * @param  string $comment
     * @return object
     */
    public function setComment(string $comment) : object
    {
        $this->comment = $comment;
        return $this;
    }  

    /**
     * @return string
     */
    public function getComment() : string
    {
        return $this->comment;
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
     * @param  int $postId
     * @return object
     */
    public function setPostId(int $postId) : object
    {
        $this->postId = $postId;
        return $this;
    }  
      
    /**
     * @return int
     */
    public function getPostId() : int
    {
        return $this->postId;
    }

    /**
     * @param  string $author
     * @return object
     */
    public function setAuthor(string $author) : object
    {
        $this->author = $author;
        return $this;
    }  
      
    /**
     * @return string
     */
    public function getAuthor() : string
    {
        return $this->author;
    }
}
