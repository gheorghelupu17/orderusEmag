<?php


namespace Models;

use Models\CharacterClass;

class BeastClass extends CharacterClass
{

    public function __construct()
    {
        parent::__construct();
        $this->setHealth(rand(_Beasts_Props_['health']['min'], _Beasts_Props_['health']['max']));
        $this->setStrength(rand(_Beasts_Props_['strength']['min'], _Beasts_Props_['strength']['max']));
        $this->setDefence(rand(_Beasts_Props_['defence']['min'], _Beasts_Props_['defence']['max']));
        $this->setSpeed(rand(_Beasts_Props_['speed']['min'], _Beasts_Props_['speed']['max']));
        $this->setLuck(rand(_Beasts_Props_['luck']['min'], _Beasts_Props_['luck']['max']));
    }

}