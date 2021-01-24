<?php

namespace core\Bee;

class Drone extends \core\Bee {

   const HP = 50;
   const DAMAGE = 12;
   const TYPE = 'drone';


    public function __construct($name , $hp = self::HP, $damage = self::DAMAGE, $type = self::TYPE )
    {
        $this->name= $name;
        parent::__construct($hp, $damage, $type);
    }
 
}