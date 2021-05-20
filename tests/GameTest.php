<?php



use PHPUnit\Framework\TestCase;
use Utils\Game;


class GameTest extends TestCase
{

    public function testPlay()
    {
        $game = new Game();
        $game->play();
        $this->assertNotEmpty($game->getWinner());
    }
    public function test__construct()
    {
    }
}
