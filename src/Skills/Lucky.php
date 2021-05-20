<?php


namespace Orderus\Skills;


use Orderus\Utils\Config;

class Lucky implements Skill
{
    use SkillTrait;

    public function __construct($changeToUse)
    {
        $config = new Config();
        $this->setType($config->lucky);
        $this->setChanceToUse($changeToUse);
        $this->setAction('lucky');
        $this->setRandomInstance();
    }

}