<?php
interface iGame{
    public function setId ($id);
    public function getId();
    public function setOpponent($playerId);
    public function getOpponent();
    public function addMovement($movement);
    public function getMovements();
    public function setWinner($playerId);
    public function getWinner();
    public function setStatus($status);
    public function getStatus();
    
}