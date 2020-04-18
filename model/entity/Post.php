<?php

Class Post {
    
    protected $id;
    protected $chapo;
    protected $title;
    protected $content;
    protected $category;


    // Setteur 

    public function setId($id){
        $this->id = $id;
    }

    public function setChapo($chapo){
        $this->chapo = $chapo;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function setCategory($category){
        $this->category = $category;
    }

    // Getteur

    public function getId() {
        return $this->id;
    }

    public function getChapo() {
        return $this->chapo;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCategory() {
        return $this->category;
    }
       
}