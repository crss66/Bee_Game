<?php

namespace core\Bee;

class Queen extends \core\Bee {

   const HP = 100;
   const DAMAGE = 8;
   const TYPE = 'queen';


    public function __construct($name , $hp = self::HP, $damage = self::DAMAGE, $type = self::TYPE )
    {
        $this->name= $name;
        parent::__construct($hp, $damage, $type);
    }

}