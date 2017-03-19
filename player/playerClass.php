<?php
class Player implements iPlayer{
    private $id,
    $userId,
    $game;
    public $games, $API;
    public function __construct(){
        $this->game = new Game();
        $this->API = new MockAPI();
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id ;
    }
    public function setUserId($id){
        $this->userId = $id;
    }
    public function getUserId(){
        return $this->userId ;
    }
    public function checkLogin($userId){
        $this->userId = $userId;
        //calls to the service and retrieve the data. If does not exist, returns false
        return $this->API->userExists($userId);
    }
    public function createUser( $user){
        
        $newUser= new User($user->getId(),$user->getPassword());
        //persist to the service
        $this->API->createUser($newUser);
    }
    public function getPendingGames(){
        //TODO: call to the service and retrieve the data.
        
        // $data = ["first game","sencond game", "third game"];
        $data = $this->API->getPendingGames($this->getUserId());
        return $data;
    }
    public function newGame(){
        $this->game = new Game();
        //persist to the service
        $index = $this->API->newGame($this->getUserId());
        //persist to self
        $this->games = $this->API->getPendingGames($this->getUserId());
        $this->game->setId($index);
        
    }
    public function userMovement($movement){
        
        //TODO: persist to the service
    }
    public function checkGameOver($id){
        //TODO: call to the service and retrieve the data.
        $isOver = false;
        return $isOver;
    }
}