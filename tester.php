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
// foreach ($tester->api->getPendingGames($tester->user->getId()) as $key => $value){
//     echo ((string) ($key+2)) . ") Move in game vs " . $value ."\n";
    
// }

foreach ($tester->api->getPendingGames("Solde") as $key => $value){
    echo ((string) ($key+2)) . ") Move in game vs " . $value ."\n";
    
}
// var_dump($tester->api->getPendingGames($tester->user->getId()));
// if ($tester->api->getUser($tester->user)!==null) {
//     print "exists\n";
// }else{
//     print "failed\n";
// }
// $tester->api->deleteUser($tester->user);
// $tester->api->createUser($tester->user);
// print_r ($tester->api->getUsers());

print "end\n";