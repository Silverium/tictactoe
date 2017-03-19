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
    protected $selection;
    public function run() {
        
        echo
        "Welcome to Tic Tac Toe API!\n" .
        "===========================\n\n" .
        
        "What is your email?(enter below):\n";
        $userId = trim(fread(STDIN, 30)); // Read up to 30 characters or a newline
        $pl = new Player();
        $pl->setUserId($userId);
        if($pl->checkLogin($userId)!==false){
            echo "Welcome back $userId!! write your password.\n";
            $password = trim(fread(STDIN, 80));
            $user = new User($userId,$password);
            if ($pl->API->getUser($user) !==null){
                $this->selection = "1983";
                while($this->selection !=="0"){
                    echo "What you want to do?\n0) Play game\n1) Delete user $userId\n";
                    $this->selection = trim(fread(STDIN, 3));
                    
                    if($this->selection === '1'){
                        echo "Players before deleting $userId in game's memory:\n";
                        print_r($pl->API->getUsers());
                        echo "\n";
                        $pl->API->deleteUser($user);
                        echo "Players remaining in game's memory:\n";
                        print_r($pl->API->getUsers());
                        echo "\n";
                        echo "Restart game\n";
                        $this->endGame = true;
                        break;
                }else if ($this->selection === '0'){
                    echo "What will your Playername be today?\n";
                    
                    $playerId = trim(fread(STDIN, 30));
                    $pl->setId($playerId);
                    echo "$playerId, Let's beat some asses!\n";
                    
                }
            }
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
        echo "This is the new list of players:\n";
        print_r ($pl->API->getUsers());
        
    }
    while (!$this->endGame) {
        //get pending games
        //show pending games and as many options as games pending
        $selTxt = "Select the option that fits you most:\n";
        echo $selTxt.
        "0) Exit game\n1) New Match\n";
        if($pl->API->userHasGames($pl->getUserId())!==false){
            $pl->games = $pl->getPendingGames();
            foreach ($pl->games as $key => $value){
                echo ((string) ($key+2)) . ") Move in game vs " . $value ."\n";
            }
        }
        $this->selection = trim(fread(STDIN, 3));
        if($this->selection === '0'){
            $this->endGame = true;
        }else if($this->selection === '1'){
            //call API to start new game with random player through playerClass
            $pl->newGame();
            
            
        }else if($this->selection < count($pl->games)+2){
            //select existing game and send a movement on it
            echo "selected option $this->selection \n";
            $pl->userMovement();
            //check if game is over
            echo "Game Status: " . $pl->checkGameOver($pl->game->getId());
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