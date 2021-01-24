<?php

namespace core;

class App {

    protected $bees = [
        'Drone' => 8,
        'Worker' => 5,
        'Queen' => 1
    ];
    

    public function game(){

        $bees = [];
        $log = [];

        if(empty($_COOKIE)) {

            $hive  = new Swarm($this->bees);

            setcookie('bees', json_encode($hive->bees), time() + (86400 * 30));

            $bees = $hive->bees;

        } else {

            $bees = json_decode($_COOKIE['bees']);
            $log = json_decode($_COOKIE['log']);
        }

        $alive_bees = [];
        $queen_is_dead = false;

        foreach($bees as $index => $bee) {


            if(!$bee->is_dead) {

                $alive_bees[$index] = $bee;

            }

        }

        if(count($alive_bees) < 2 || $queen_is_dead) {

            echo 'Game over!<br>';

            unset($_COOKIE['bees']);
            unset($_COOKIE['log']);

            setcookie('bees', '', time() - 3600);
            setcookie('log', '', time() - 3600);

            echo '<a href=""><button>Reload</button></a>';
            
            return;
        
        }
      
        

        $bee_to_fight = array_rand($alive_bees);
        
        
        $bees[$bee_to_fight]->current_hp = $bees[$bee_to_fight]->current_hp - $bees[$bee_to_fight]->damage;
      
        if($bees[$bee_to_fight]->current_hp < 0 ) {
            
            $bees[$bee_to_fight]->is_dead = true;
           
        }

        array_unshift($log, $bees[$bee_to_fight]->name . ' was atacked with ' . $bees[$bee_to_fight]->damage);

        if($bees[$bee_to_fight]->type === 'queen') {

            $queen_is_dead = true;

        }

        setcookie('bees', json_encode($bees), time() + (86400 * 30));
        setcookie('log', json_encode($log), time() + (86400 * 30));

        include 'views/index.view.php';
        
        
        
    }

}