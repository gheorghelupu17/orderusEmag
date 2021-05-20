<?php


namespace Orderus\Players;


use Orderus\Factory\Factory;
use Orderus\Skills\Lucky;
use Orderus\Skills\Skill;
use Orderus\Skills\SkillTrait;
use Orderus\Utils\Config;

class Orderus implements Player
{
    use CharacterTrait;

    private $skills = [];
    private $config;


    public function __construct()
    {
        $config = new Config();
        $this->setHealth(rand($config->orderus_props['health']['min'], $config->orderus_props['health']['max']));
        $this->setStrength(rand($config->orderus_props['strength']['min'], $config->orderus_props['strength']['max']));
        $this->setDefence(rand($config->orderus_props['defence']['min'], $config->orderus_props['defence']['max']));
        $this->setSpeed(rand($config->orderus_props['speed']['min'], $config->orderus_props['speed']['max']));
        $this->setLuck(rand($config->orderus_props['luck']['min'], $config->orderus_props['luck']['max']));
        $this->luckyInstance = new Lucky($this->getLuck());
        $skills = $config->orderus_props['skills'];
        $this->importSkills($skills);
    }

    public function getSkills(): array
    {
        return $this->skills;
    }

    public function getAttackSkills(): array
    {
        $tmp = [];
        $config = new Config();
        foreach ($this->getSkills() as $skill) {
            if ($skill->getType() == $config->attack_skill) {
                $tmp [] = $skill;
            }
        }
        return $tmp;
    }

    public function getDefenceSkills(): array
    {
        $tmp = [];
        $config = new Config();
        foreach ($this->getSkills() as $skill) {
            if ($skill->getType() == $config->defence_skill) {
                $tmp [] = $skill;
            }
        }
        return $tmp;
    }

    public function addSkill(Skill $skill)
    {
        $config = new Config();
        if ($skill->getType() == $config->attack_skill) {
            $this->setHasAttackSkill(true);
        }
        if ($skill->getType() == $config->defence_skill) {
            $this->setHasDefenceSkill(true);
        }
        $this->skills [] = $skill;
    }


    private function importSkills($skills)
    {
        foreach ($skills as $skill) {
            $skillClass = Factory::createSkill($skill);
            $this->addSkill($skillClass);
        }
    }

    public function getName(): string
    {
        return "Orderus";
    }


}