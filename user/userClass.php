<?php
class User implements iUser{
    private  $id,
    $password;
    private function HashPassword($toHash){
        $this -> password = $toHash;
    }
    public function __construct($id,$password) {
        $this->id = $id;
        $this->password = $password;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id ;
    }
    public function setPassword($password){
        HashPassword($password);
    }
    public function getPassword(){
        return $this->password ;
    }
}