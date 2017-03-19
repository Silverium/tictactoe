<?php
interface iUser{
    
    public function setId ( $id);
    public function getId();
    public function setPassword( $hashedPassword);
    public function getPassword();
    
};
