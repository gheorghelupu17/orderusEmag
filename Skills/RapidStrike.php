<?php


namespace Skills;


class RapidStrike extends SkillClass
{
    public function __construct()
    {
        $this->setType(_ATTACK_SKILL);
        $this->setChanceToUse(20);
        $this->setAction("attack_twice");
        $this->setRandomInstance();
    }


}