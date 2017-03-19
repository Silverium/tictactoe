<?php
interface iMove{
    public function setPlayer( $playerId);
    public function getPlayer();
    public function setMovement( $movement);
    public function getMovement();
}