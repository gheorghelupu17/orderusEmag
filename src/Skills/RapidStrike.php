<?php


namespace Orderus\Skills;


use Orderus\Utils\Config;

class RapidStrike
{
    use  SkillTrait;

    public function __construct()
    {
        $config = new Config();
        $this->setType($config->attack_skill);
        $this->setChanceToUse(10);
        $this->setAction("attack_twice");
        $this->setRandomInstance();
    }


}