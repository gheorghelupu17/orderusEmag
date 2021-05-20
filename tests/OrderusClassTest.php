<?php

namespace Models;

use Orderus\Players\Orderus;
use Orderus\Utils\Config;
use PHPUnit\Framework\TestCase;

class OrderusClassTest extends TestCase
{

    public function test__construct()
    {
        $config = new Config();
        $orderus = new Orderus();

        foreach ($config->orderus_props as $key => $value) {
            if ($key != "skills") {
                $method = "get" . lcfirst($key);
                $this->assertLessThanOrEqual($orderus->$method(), $value['min']);
                $this->assertGreaterThanOrEqual($orderus->$method(), $value['max']);
            }
            else
            {
                $numberOfSkillsConfig = count($value);
                $numberOfSkillsFromInstance = count($orderus->getSkills());
                $this->assertEquals($numberOfSkillsFromInstance,$numberOfSkillsConfig);
            }
        }
    }

    public function testAddSkill()
    {
    }

    public function testGetSkills()
    {
    }

    public function testSetSkills()
    {
    }
}
