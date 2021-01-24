<?php

namespace core;

class Bee {


    public $hp;

    public $current_hp;

    public $damage;

    public $type;

    public $name;

    public $is_dead;


    public function __construct( $hp, $damage, $type ){

        $this->is_dead    = false;
        $this->hp         = $hp;
        $this->current_hp = $hp;
        $this->damage     = $damage;
        $this->type       = $type;

    }

}