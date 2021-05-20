<?php


namespace Utils;


class RandomSet
{
    private $values;

    public function setRandomWeigh($weight)
    {
        for ($i = 1; $i <= 100; $i++) {
            if ($i > $weight) {
                $this->values[$i] = false;
            } else {
                $this->values[$i] = true;
            }
        }
        return $this;
    }
    public function randomWeight()
    {
        $index = rand(0,count($this->values));
        $value  = $this->values[$index];
        unset($this->values[$index]);
        return $value;
    }

}