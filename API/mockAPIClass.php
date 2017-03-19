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
        $this->games =[
        ["id"=>"Solde", "games" =>[
        "eDreams","eDreams","Pedro", "eDreams"
        ]],
        ["id"=>"eDreams", "games" =>[
        "Solde","Pedro", "Solde", "Solde"
        ]],
        ["id"=>"Pedro", "games" =>[
        "Solde","eDreams"
        ]]
        ];
    }
    public function getUsers(){
        return $this->users;
    }
    public function deleteUser($user){
        $index = array_search($user->getId(), array_column($this->users,"id"));
        unset($this->users [$index]);
        return $this->users;
    }
    public function createUser($user){
        array_push($this->users,$user);
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
    public function getPendingGames($userId){
        // return pending games of selected user
            return $this->games[array_search($userId, array_column($this->games,"id"))]["games"];
        // if ($this->userExists($userId)!==false) {
        // }else{
        //     return null;
        // }
    }
}