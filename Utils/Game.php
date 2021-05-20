<?php

namespace Utils;

use Models\BeastClass;
use Models\CharacterClass;
use Models\OrderusClass;
use phpDocumentor\Reflection\Types\This;

class Game
{
    private $rounds;
    private $winner;
    private $orderus;
    private $beast;
    private $roundCounter = 0;


    public function __construct()
    {
        $this->orderus = new OrderusClass();
        $this->beast = new BeastClass();
        $this->rounds = _GAME_ROUNDS;
    }

    public function play()
    {
        $skills = [0,0];
//        echo "Bestie:".$this->beast->getHealth()."\n";

//        echo "Orderus:".$this->orderus->getHealth()."\n";
        while ($this->roundCounter < $this->rounds) {
            $firstPlayer = $this->whoAttackFirst();
            $secondPlayer = $this->getSecondPlayer($firstPlayer);
            $firstPlayer->attack($secondPlayer);
            $secondPlayer->attack($firstPlayer);
            $this->roundCounter++;
        }
        die();
    }

    private function checkHealth()
    {
        if ($this->beast->getHealth() < 1) {
            $this->winner = $this->orderus;
            return false;
        }
        if ($this->orderus->getHealth() < 1) {
            $this->winner = $this->beast;
            return false;
        }
        return true;
    }

    private function whoAttackFirst()
    {
        if ($this->orderus->getSpeed() > $this->beast->getSpeed()) {
            return $this->orderus;
        }
        if ($this->beast->getSpeed() > $this->orderus->getSpeed()) {
            return $this->beast;
        }
        if ($this->orderus->getLuck() > $this->beast->getLuck()) {
            return $this->orderus;
        }
        if ($this->beast->getLuck() > $this->orderus->getLuck()) {
            return $this->beast;
        }
    }

    private function getSecondPlayer(CharacterClass $firstPlayer)
    {
        if (get_class($firstPlayer) === "OrderusClass") {
            return $this->beast;
        }
        return $this->orderus;
    }

}