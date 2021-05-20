<?php

namespace Tests;
use PHPUnit\Framework\TestCase;
use src\Utils\Game;


class GameTest extends TestCase
{

    public function testPlay()
    {
        $game = new Game();
        $game->play();
        $this->assertNotEmpty($game->getWinner());
    }
}
