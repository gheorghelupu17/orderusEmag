<?php


namespace Orderus\Players;

use Orderus\Utils\Config;

class Beast implements Player
{
    use CharacterTrait;

    public function __construct()
    {
        $config = new Config();
        $this->setHealth(rand($config->beasts_props['health']['min'], $config->beasts_props['health']['max']));
        $this->setStrength(rand($config->beasts_props['strength']['min'], $config->beasts_props['strength']['max']));
        $this->setDefence(rand($config->beasts_props['defence']['min'], $config->beasts_props['defence']['max']));
        $this->setSpeed(rand($config->beasts_props['speed']['min'], $config->beasts_props['speed']['max']));
        $this->setLuck(rand($config->beasts_props['luck']['min'], $config->beasts_props['luck']['max']));
    }

    public function getName(): string
    {
        return __CLASS__;
    }

}