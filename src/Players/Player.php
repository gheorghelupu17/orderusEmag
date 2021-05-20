<?php


namespace Orderus\Players;


interface Player
{

    public function getHealth();

    public function setHealth($health);

    public function getStrength();

    public function setStrength($strength);

    public function getDefence();

    public function setDefence($defence);

    public function getSpeed();

    public function setSpeed($speed);

    public function getLuck();

    public function setLuck($luck);

    public function getHasAttackSkill();

    public function setHasAttackSkill($hasAttackSkill): void;

    public function getHasDefenceSkill();

    public function setHasDefenceSkill($hasDefenceSkill): void;

    public function getName(): string;

    public function attack(Player $player);
    public function getLuckyInstance();

}