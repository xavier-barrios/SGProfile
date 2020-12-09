<?php

class Users {
    private $id;
    private $name;
    private $email;
    private $password;
    private $status;
    private $profile;

    public function __construct($email, $password) {
            $this->email=$email;
            $this->password=$password;
    }

    public function getId(){
        return $this->id;
    }

 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getName(){
        return $this->name;
    }
 
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function getPassword(){
        return $this->password;
    }
 
    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    public function getStatus(){
        return $this->status;
    }
 
    public function setStatus($status){
        $this->status = $status;
        return $this;
    }
 
    public function getProfile(){
        return $this->profile;
    }

    public function setProfile($profile){
        $this->profile = $profile;
        return $this;
    }
}
?>