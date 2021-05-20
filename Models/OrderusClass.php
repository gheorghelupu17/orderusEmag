<?php


namespace Models;


use Skills\SkillClass;
use Utils\RandomSet;

class OrderusClass extends CharacterClass
{
    private $skills = [];


    public function __construct()
    {
        parent::__construct();
        $this->setHealth(rand(_Orderus_Props_['health']['min'], _Orderus_Props_['health']['max']));
        $this->setStrength(rand(_Orderus_Props_['strength']['min'], _Orderus_Props_['strength']['max']));
        $this->setDefence(rand(_Orderus_Props_['defence']['min'], _Orderus_Props_['defence']['max']));
        $this->setSpeed(rand(_Orderus_Props_['speed']['min'], _Orderus_Props_['speed']['max']));
        $this->setLuck(rand(_Orderus_Props_['luck']['min'], _Orderus_Props_['luck']['max']));
        $skills = _Orderus_Props_['skills'];
        $this->importSkills($skills);
    }

    /**
     * @return array
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * @param array $skills
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    public function addSkill(SkillClass $skill)
    {
        if ($skill->getType() == 'attack') {
            $this->setHasAttackSkill(true);
        } else {
            $this->setHasDefenceSkill(true);
        }
        $this->skills [] = $skill;
    }

    public function removeSkill(SkillClass $skill)
    {
    }

    private function importSkills($skills)
    {
        foreach ($skills as $skill) {
            $skillClassName = "Skills\\$skill";
            if (!class_exists($skillClassName)) {
                throw new \Error("Error in OrderusClass {$skillClassName} doesn't exist");
            }
            $skillClass = new $skillClassName();
            $this->addSkill($skillClass);
        }
    }




}