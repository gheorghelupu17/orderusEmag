<?php


namespace Orderus\Skills;


interface Skill
{
    /**
     * @return mixed
     */
    public function getType();

    public function setType($type);

    public function getChanceToUse();

    public function setChanceToUse($chanceToUse);

    public function getAction();

    public function setAction($action);

    public function getRandomInstance();

    public function setRandomInstance(): void;

}