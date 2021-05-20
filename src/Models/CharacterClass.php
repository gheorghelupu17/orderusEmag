<?php


namespace src\Models;


abstract class  CharacterClass
{
    private $health;
    private $strength;
    private $defence;
    private $speed;
    private $luck;
    private $hasAttackSkill = false;
    private $hasDefenceSkill = false;

    protected function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param mixed $health
     */
    public function setHealth($health)
    {
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param mixed $strength
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    }

    /**
     * @return mixed
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * @param mixed $defence
     */
    public function setDefence($defence)
    {
        $this->defence = $defence;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param mixed $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @param mixed $luck
     */
    public function setLuck($luck)
    {
        $this->luck = $luck;
    }

    /**
     * @return mixed
     */
    public function getHasAttackSkill()
    {
        return $this->hasAttackSkill;
    }

    /**
     * @param mixed $hasAttackSkill
     */
    public function setHasAttackSkill($hasAttackSkill): void
    {
        $this->hasAttackSkill = $hasAttackSkill;
    }

    /**
     * @return mixed
     */
    public function getHasDefenceSkill()
    {
        return $this->hasDefenceSkill;
    }

    /**
     * @param mixed $hasDefenceSkill
     */
    public function setHasDefenceSkill($hasDefenceSkill): void
    {
        $this->hasDefenceSkill = $hasDefenceSkill;
    }


    public function attack(CharacterClass $player)
    {
        $defaceFromSkills = 0;
        if ($this->getHasAttackSkill()) {
            $skills = $this->getAttackSkills();
            foreach ($skills as $skill) {
                if ($skill->getRandomInstance()->randomWeight()) {
                    if ($skill->getAction() == 'attack_twice') {
                        echo "attack_twice used\n";
                        $this->attack($player);
                    }
                }
            }
        }
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
        echo "Before attack player has: {$player->getHealth()}\n";
        $damage = ($this->getStrength() - $player->getDefence())*$defaceFromSkills;
        $health = $player->getHealth() - $damage ;
        $player->setHealth($health);
        echo "After attack player has: {$player->getHealth()}\n";
    }


}