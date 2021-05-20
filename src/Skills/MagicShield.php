<?php


namespace Orderus\Skills;


use Orderus\Utils\Config;

class MagicShield implements Skill
{
    use SkillTrait;
    public function __construct()
    {
        $config = new Config();

        $this->setType($config->defence_skill);
        $this->setChanceToUse(20);
        $this->setAction('magic_shield');
        $this->setRandomInstance();
    }

}