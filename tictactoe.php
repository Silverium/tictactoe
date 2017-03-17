#!/usr/bin/php -q
<?php
interface iUser{
     
   public function setId ( $id);
   public function getId();
   public function setPassword( $hashedPassword);
   public function getPassword();

};

interface iPlayer{
    public function setId($id);
    public function getId();
    public function checkLogin( $user);
    public function createUser( $user);
    public function getPendingGames();
    public function newGame();
    public function userMovement( $movement);
    public function checkGameOver( $id);

};
interface iGame{
    public function setOpponent(
         $playerId);
    public function getOpponent();
    public function addMovement( $movement);
    public function getMovements();
    public function setWinner( $playerId);
    public function getWinner();
    public function setStatus( $status);
    public function getStatus();

}
interface iMove{
    public function setPlayer( $playerId);
    public function getPlayer();
    public function setMovement( $movement);
    public function getMovement();
}
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
class Player implements iPlayer{
    private $id, 
    $userId, 
    $games;
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
       return $this->id ;
    }
    public function checkLogin( $user){
        //TODO: call to the service and retrieve the data. If exists and pass is correct, return true

        return false;
    }
    public function createUser( $user){

       $newUser= new User($user->id,$user->password);
        
        //TODO: persist to the service
    }
    public function getPendingGames(){
        //TODO: call to the service and retrieve the data.
        $data = "mockData";
        return $data;
    }
    public function newGame(){
        $game = new Game();
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
class Game implements iGame{
    private $id,
    $opponent,
    $movements, 
    $winner,
    $status;
    public function setOpponent($playerId){
        $this->opponent = $playerId;
    }
    public function getOpponent(){
        return $opponent;
    }
    public function addMovement($movement){
        $allMovements = getMovements();
        $allMovements += $movement;
                //TODO: persist to the service

    }
    public function getMovements(){
        //TODO: call to the service and retrieve the data.
        $data = "movements from gameId";
        return $data;
    }
    public function setWinner($playerId){
        $this->winner = $playerId;
                //TODO: persist to the service

    }
    public function getWinner(){
        //TODO: call to the service and retrieve the data.
        $data = "The winner is Soldeplata";
        return $data;
    }
    public function setStatus($status){
        $this->status = $status;
                //TODO: persist to the service

    }
    public function getStatus(){
        //TODO: call to the service and retrieve the data.
        $data = "Status of game gameId";
        return $data;
    }
}
class Move implements iMove{
    private $movement, 
    $playerId;
    public function setPlayer( $playerId){
        $this->playerId = $playerId;
    }
    public function getPlayer(){
        return $this->playerId;
    }
    public function setMovement( $movement){
        $this->movement = $movement;
    }
    public function getMovement(){
        return $this->movement;
    }
}
echo "Hello! What is your name (enter below):\n";
$strName = fread(STDIN, 30); // Read up to 30 characters or a newline
echo 'Hello ' , $strName , "\n";