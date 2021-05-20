<?php


namespace Utils;


class RandomSet
{
    private $values;

    public function setRandomWeigh($weight)
    {
        $weight = round($weight / 100 * _GAME_ROUNDS);
        for ($i = 1; $i <= _GAME_ROUNDS; $i++) {
            if ($i > $weight) {
                $this->values[$i] = false;
            } else {
                $this->values[$i] = true;
            }
        }
        shuffle($this->values);
        var_dump($this->values);
        return $this;
    }

    public function randomWeight()
    {
        $index = rand(0, count($this->values) - 1);
        $value = $this->values[$index];
        array_splice($this->values, $index, 1);
        return $value;
    }

}