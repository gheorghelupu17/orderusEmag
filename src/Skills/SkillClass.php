<?php


namespace src\Skills;


use src\Utils\RandomSet;

abstract class SkillClass
{
    private $type;
    private $chanceToUse;
    private $action;
    private $randomInstance;

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

        $this->chanceToUse = $chanceToUse;
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

    /**
     * @return mixed
     */
    public function getRandomInstance()
    {
        return $this->randomInstance;
    }


    public function setRandomInstance(): void
    {
        $random =new RandomSet();
        $this->randomInstance = $random->setRandomWeigh($this->chanceToUse);
    }


}