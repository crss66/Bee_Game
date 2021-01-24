<?php

namespace core\Bee;

class Worker extends \core\Bee {

   const HP = 75;
   const DAMAGE = 10;
   const TYPE = 'worker';


    public function __construct($name , $hp = self::HP, $damage = self::DAMAGE, $type = self::TYPE )
    {
        $this->name= $name;
        parent::__construct($hp, $damage, $type);
    }

   
}