<?php


namespace Orderus\Skills;


use Orderus\Utils\RandomSet;

trait SkillTrait
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
     * @return SkillTrait
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
     * @return SkillTrait
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
     * @return SkillTrait
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
        $random = new RandomSet();
        $this->randomInstance = $random->setRandomWeigh($this->chanceToUse);
    }


}