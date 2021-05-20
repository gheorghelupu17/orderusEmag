<?php

namespace Orderus\Tests;

use Orderus\Players\Beast;
use Orderus\Utils\Config;
use PHPUnit\Framework\TestCase;

class BeastClassTest extends TestCase
{

    public function test__construct()
    {
        $config = new Config();
        $beast = new Beast();

        foreach ($config->beasts_props as $key => $value) {
            $method = "get" . lcfirst($key);
            $this->assertLessThanOrEqual($beast->$method(), $value['min']);
            $this->assertGreaterThanOrEqual($beast->$method(), $value['max']);
        }
    }
}
