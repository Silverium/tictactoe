#!/usr/bin/php -q
<?php
require "./player/playerInterface.php";
require "./player/playerClass.php";
require "./user/userInterface.php";
require "./user/userClass.php";
require "./game/gameInterface.php";
require "./game/gameClass.php";
require "./move/moveInterface.php";
require "./move/moveClass.php";
require "./API/mockAPIClass.php";
class Tester{
public $api;
public $user;
public $solde = "Soldeplata";

public function __construct(){
$this->api= new MockAPI();
$this->user = new User("Solde","asdf");

}

}
$tester = new Tester();
$arr =$tester->api->getUsers();
// print_r (array_search("asdf", array_column($arr,"id")));
// print_r ( in_array(["id"=>"Solde", "password" =>"asdf"],$tester->api->getUsers()));
// if ($tester->api->userExists("Solde")!==false) {
//     print "exists\n";
if ($tester->api->getUser($tester->user)!==null) {
    print "exists\n";
}else{
    print "failed\n";
}
print "end\n";
