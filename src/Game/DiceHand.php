<?php
namespace sihd\Game;

class DiceHand
{
    private $dices;
    private $values;
    private $numDices;
    public function __construct(int $dices = 1)
    {
        $this->dices  = [];
        $this->values = [];
        $this->numDices = $dices;
        for ($i = 0; $i < $this->numDices; $i++) {
            $this->dices[]  = new Dice();
            $this->values[] = null;
        }
    }
    public function rolls()
    {
        for ($i = 0; $i < $this->numDices; $i++) {
            $this->values[$i] = $this->dices[$i]->roll();
        }
        return $this->values;
    }
    public function getValues()
    {
        return $this->values;
    }
}
