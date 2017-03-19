<?php
class Player implements iPlayer{
    private $id,
    $userId;
    public $games, $API,
    $game;
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
        // call to the service and retrieve the data.
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
    public function userMovement(){
        $userId = $this->getUserId();
        //interface to choose the movement
        //not sending the parameter makes the echoes be very unreusable
        echo "Choose the cell where to move\n";
        for ($i =1;$i<10;$i++){
            echo "$i) Cell $i\n";
        }
        $movement = trim(fread(STDIN, 3));
        $move = new Move($movement, $userId);
        // persist to the service
        $this->API->addMovement($move,$userId, $this->game->getId());
        
    }
    public function checkGameOver($id){
        // call to the service and retrieve the data.
        $status = $this->API->checkGameOver($id);
        return $status;
    }
}