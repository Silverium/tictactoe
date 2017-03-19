<?php
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