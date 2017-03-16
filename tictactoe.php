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
    public function createUser( $id);
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
}
class Player implements iPlayer{
    private $id, 
    $userId, 
    $games;
}
class Game implements iGame{
    private $id,
    $opponent,
    $movements, 
    $winner,
    $status;
}
class Move implements iMove{
    private $movement, 
    $playerId;
}