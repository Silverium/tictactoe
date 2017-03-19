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
class Launcher{
    protected $endGame= false;
    protected $selection,
    $API ;
    public function run() {
        $this->API = new MockAPI();
        echo
        "Welcome to Tic Tac Toe API!\n" .
        "===========================\n\n" .
        
        "What is your email?(enter below):\n";
        $userId = trim(fread(STDIN, 30)); // Read up to 30 characters or a newline
        $pl = new Player();
        if($pl->checkLogin($userId, $this->API)!==false){
            echo "Welcome back $userId!! write your password.\n";
            $password = trim(fread(STDIN, 80));
            $user = new User($userId,$password);
            if ($this->API->getUser($user) !==null){
                $pl->setUserId($userId);
                echo "What will your Playername be today?\n";
            $playerId = trim(fread(STDIN, 30));
            $pl->setId($playerId);
            echo "$playerId, Let's beat some asses!\n";
            }else{
                echo "password is wrong. Restart game\n";
                $this->endGame = true;
            }
        }else{
            echo "You don't have an account yet. \nWhat will your Playername be?\n";
            $playerId = trim(fread(STDIN, 30));
            $pl->setId($playerId);
            echo "Hello $playerId!! write your password.\n";
            $password = trim(fread(STDIN, 80));
            $user = new User($userId,$password);
            $pl->createUser($user);
            echo "New User created with email ".$user->getId()." and playerName $playerId.\nLet's play!\n";
            
        }
        while (!$this->endGame) {
            //get pending games
            $pl->games = $pl->getPendingGames();
            //show pending games and as many options as games pending
            $selTxt = "Select the option that fits you most:\n";
            echo $selTxt.
            "0) Exit game\n1) New Match\n";
          foreach ($pl->games as $key => $value){
                echo ((string) ($key+2)) . ") Move in game: " . $value ."\n";
                
            }
            $this->selection = trim(fread(STDIN, 3));
            if($this->selection === '0'){
                $this->endGame = true;
        }else{
            ($pl->games[$this->selection]);
            echo "one more time!\n";
        }
        if ($this->selection === '0') {
            echo "Exiting game\n\n";
        }
    }
}
}
$launcher = new Launcher();
$launcher->run();