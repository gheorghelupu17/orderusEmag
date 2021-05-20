<?php


namespace Skills;


use Utils\RandomSet;

abstract class SkillClass
{
    private $type;
    private $chanceToUse;
    private $action;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return SkillClass
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getChanceToUse()
    {
        return $this->chanceToUse;
    }

    /**
     * @param mixed $chanceToUse
     * @return SkillClass
     */
    public function setChanceToUse($chanceToUse)
    {
        $random = new RandomSet();
        $this->chanceToUse = $random->setRandomWeigh($chanceToUse);;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     * @return SkillClass
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }


}