<?php

class Profile {
    private $id;
    private $name;

    function __construct() {
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
}
?>