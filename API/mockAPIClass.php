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
        $arr =["id" =>$user->getId(), "password"=>$user->getPassword()];
        array_push($this->users,$arr);
        
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
    public function userHasGames($userId){
        $arrIds = array_column($this->games,"id");
        $has= array_search($userId, $arrIds);
        return $has !== false;
    }
    public function getPendingGames($userId){
        
        return $this->games[array_search($userId, array_column($this->games,"id"))]["games"];
    }
    public function newGame($userId){
        //get users and select random user except userId
        $opponent =$userId;
        while ($opponent === $userId) {
            $arrIds = array_column($this->users,"id");
            $indOp= array_rand($arrIds);
            $opponent= $arrIds[$indOp];
        }
        //push opponent as the new game in games object
        //array push returns the number of elements, that is the index of new Game
        $indUser = $this->userExists($userId);
        if ($this->userHasGames($userId)!==false) {
            
            $index = array_push($this->games[$indUser]["games"],$opponent);
        }else{
            $index =1;
            array_push($this->games,["id"=>$userId, "games" =>[$opponent]]);
            
        }
        $indOp= array_search($opponent, array_column($this->games,"id"));
        //push as well in games of opponent with userId
        array_push($this->games[$indOp]["games"], $userId);
        return $index;
    }
    public function addMovement($move,$userId,$gameId){
        //TODO: this would persist the movement in an associative array
        echo "Movement persisted to DB\n";
        
    }
    public function checkGameOver($id){
        //TODO: store in DB the status and retrieve it from DB instead of returning a mock response
        $i = rand(1,3);
        if ($i === 1) {
            return "You lost\n";
        } elseif ($i === 2) {
            return "You lost\n";
        } elseif ($i === 3) {
            return "Not finished yet\n";
        }
    }
}