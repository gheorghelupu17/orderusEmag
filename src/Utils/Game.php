<?php

namespace Orderus\Utils;

use Orderus\Players\Beast;
use Orderus\Players\CharacterTrait;
use Orderus\Players\Orderus;
use Orderus\Players\Player;

class Game
{
    private $rounds;
    private $winner;
    private $orderus;
    private $beast;
    private $roundCounter = 0;


    public function __construct()
    {
        $this->orderus = new Orderus();
        $this->beast = new Beast();
        $this->config = new Config();
        $this->rounds = $this->config->game_rounds;
    }

    public function play()
    {
        while ($this->checkHealth() && $this->roundCounter < $this->rounds) {
            echo "Round :{$this->roundCounter}\n\n";
            $firstPlayer = $this->whoAttackFirst();
            $className = get_class($firstPlayer);
            echo "First attack make by {$className}\n";
            $secondPlayer = $this->getSecondPlayer($firstPlayer);
            $className = get_class($secondPlayer);
            echo "Second attack make by {$className}\n";
            $firstPlayer->attack($secondPlayer);
            $secondPlayer->attack($firstPlayer);
            $this->roundCounter++;
        }
        $winner = get_class($this->winner);
        echo "\n\n\n Castigatorul e {$winner} \n\n\n";
    }

    private function checkHealth()
    {
        $this->winner = $this->orderus;
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

    private function getSecondPlayer(Player $firstPlayer)
    {
        if (get_class($firstPlayer) === "Orderus\Players\Orderus") {
            return $this->beast;
        }
        return $this->orderus;
    }

    /**
     * @return mixed
     */
    public function getWinner()
    {
        return $this->winner;
    }

}