<?php

class MockAPI{
    private $users,$games;
    function __construct(){
        //some mock data
        $this->users = [
        ["id"=>"Solde", "password" =>"asdf"],
        ["id"=>"eDreams", "password" =>"asdf"],
        ["id"=>"Pedro", "password" =>"asdf"]
        ];
    }
    public function getUsers(){
        return $this->users;
    }
    function userExists($userId){
        return array_search($userId, array_column($this->users,"id"));
    }
    public function getUser($user){
        $arr =["id" =>$user->getId(), "password"=>$user->getPassword()];
        if (in_array($arr,$this->users)) {
            return $this->users[array_search($arr,$this->users)];
        }else{
            return null;
        }
    }
}