<?php
interface iPlayer{
    public function setId($id);
    public function getId();
    public function setUserId($id);
    public function getUserId();
    public function checkLogin( $user);
    public function createUser( $user);
    public function getPendingGames();
    public function newGame();
    public function userMovement( $movement);
    public function checkGameOver( $id);
    
};