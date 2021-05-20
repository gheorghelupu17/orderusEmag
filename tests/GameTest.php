<?php

namespace Tests;
use Orderus\Utils\Game;
use PHPUnit\Framework\TestCase;



class GameTest extends TestCase
{

    public function testPlay()
    {
        $game = new Game();
        $game->play();
        $this->assertNotEmpty($game->getWinner());
    }
}
