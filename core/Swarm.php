<?php

namespace core;


class Swarm {
    
    public $bees = [];

    public function __construct( $bees ) {

        $this->addBee( $bees );
        
    }

    protected function addBee( $bees ) {
       
        $class_name = '';

        foreach( $bees as $bee_type => $bee_nr ){

            $class_name = '\core\Bee\\' . $bee_type;

            if( class_exists( $class_name )) {

                for( $i = 0; $i < $bee_nr; $i++ ){

                    $this->bees[] = new $class_name($bee_type . ($bee_nr === 1 ? '' : '_' . $i));

                }

            }

        }

    }

}