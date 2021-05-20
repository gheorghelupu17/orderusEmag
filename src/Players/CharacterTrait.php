<?php


namespace Orderus\Players;


trait   CharacterTrait
{
    private $health;
    private $strength;
    private $defence;
    private $speed;
    private $luck;
    private $hasAttackSkill = false;
    private $hasDefenceSkill = false;
    private $luckyInstance;


    public function getHealth()
    {
        return $this->health;
    }

    public function setHealth($health)
    {
        $this->health = $health;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    public function getDefence()
    {
        return $this->defence;
    }

    public function setDefence($defence)
    {
        $this->defence = $defence;
    }

    public function getSpeed()
    {
        return $this->speed;
    }


    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function getLuck()
    {
        return $this->luck;
    }

    public function setLuck($luck)
    {
        $this->luck = $luck;
    }


    public function getHasAttackSkill(): bool
    {
        return $this->hasAttackSkill;
    }


    public function setHasAttackSkill($hasAttackSkill): void
    {
        $this->hasAttackSkill = $hasAttackSkill;
    }


    public function getHasDefenceSkill(): bool
    {
        return $this->hasDefenceSkill;
    }


    public function setHasDefenceSkill($hasDefenceSkill): void
    {
        $this->hasDefenceSkill = $hasDefenceSkill;
    }

    public function getName(): string
    {
        return __CLASS__;
    }

    public function getLuckyInstance()
    {
        return $this->luckyInstance;
    }


    public function attack(Player $player)
    {
        $attackFromSkills = $this->checkAttackSkills();
        $defaceFromSkills = $this->checkDefenceSkills($player);

        echo "Before {$player->getName()} player has: {$player->getHealth()}\n";
        $damage = (($this->getStrength() * $attackFromSkills) - $player->getDefence()) * $defaceFromSkills;
        if ($this->checkIsLucky($player)) {
            echo "{$player->getName()} has lucky damage :0\n ";
            $damage = 0;
        }
        $health = $player->getHealth() - $damage;
        $player->setHealth($health);
        echo "After attack {$player->getName()} has: {$player->getHealth()}\n";
    }

    private function checkAttackSkills()
    {
        $attackFromSkills = 1;
        if ($this->getHasAttackSkill()) {
            $skills = $this->getAttackSkills();
            foreach ($skills as $skill) {
                if ($skill->getRandomInstance()->randomWeight()) {
                    if ($skill->getAction() == 'attack_twice') {
                        echo "attack_twice used\n";
                        $attackFromSkills = 2;
                    }
                }
            }
        }
        return $attackFromSkills;
    }

    private function checkDefenceSkills(Player $player)
    {
        $defaceFromSkills = 1;

        if ($player->getHasDefenceSkill()) {
            $skills = $player->getDefenceSkills();
            foreach ($skills as $skill) {
                if ($skill->getRandomInstance()->randomWeight()) {
                    if ($skill->getAction() == 'magic_shield') {
                        echo "magic_shield used\n";
                        $defaceFromSkills = '0.5';
                    }
                }
            }
        }
        return $defaceFromSkills;
    }

    private function checkIsLucky(Player $player)
    {
        return $player->getLuckyInstance()->getRandomInstance()->randomWeight();
    }


}