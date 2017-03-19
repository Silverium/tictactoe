<?php
class Game implements iGame{
    private $id,
    $opponent,
    $movements,
    $winner,
    $status;
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id ;
    }
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