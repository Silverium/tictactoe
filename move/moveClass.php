<?php
class Move implements iMove{
    private $movement,
    $playerId;
    public function __construct($movement, $playerId){
        $this->movement = $movement;
        $this->playerId = $playerId;
    }
    public function setPlayer( $playerId){
        $this->playerId = $playerId;
    }
    public function getPlayer(){
        return $this->playerId;
    }
    public function setMovement($movement){
        $this->movement = $movement;
        //persist to API
    }
    public function getMovement(){
        return $this->movement;
    }
}