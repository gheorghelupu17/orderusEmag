<?php


namespace Skills;


class MagicShield extends SkillClass
{
    public function __construct()
    {
        $this->setType(_DEFENCE_SKILL);
        $this->setChanceToUse(20);
        $this->setAction('take_half');

    }

}