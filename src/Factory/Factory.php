<?php


namespace Orderus\Factory;

class Factory
{
    public static function createSkill($skill)
    {
        $namespace = "Orderus\Skills\\";
        $className = $namespace . $skill;
        return new $className();
    }
}