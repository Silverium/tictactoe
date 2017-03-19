<?php
class Player implements iPlayer{
    private $id,
    $userId,
    $game;
    public $games;
    public function __construct(){
        $this->game = new Game();
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
    public function checkLogin($userId, $API){
        $this->userId = $userId;
        //calls to the service and retrieve the data. If does not exist, returns false
        return $API->userExists($userId);
    }
    public function createUser( $user){
        
        $newUser= new User($user->getId(),$user->getPassword());
        
        //TODO: persist to the service
    }
    public function getPendingGames(){
        //TODO: call to the service and retrieve the data.
        $data = ["first game","sencond game", "third game"];
        return $data;
    }
    public function newGame(){
        $this->game = new Game();
        //TODO: persist to the service
        return $game->id;
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