<?php

class Posts{
//Atributos
    private $id;
    private $title;
    private $path;
    private $user;
//Constructor
    public function __construct() {

    }
//Metodos Getters y setters
//Getters: para devolver valores y Setters: para meter valores

    public function getId(){
        return $this->id;
    }
 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    public function getPath(){
        return $this->path;
    }

    public function setPath($path){
        $this->path = $path;
        return $this;
    }
 
    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
        return $this;
    }
}