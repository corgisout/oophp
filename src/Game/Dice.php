<?php

namespace sihd\Game;

class Dice
{
    protected $sides;
    private $rolls;


    public function __construct(int $sides = 6) {
        $this->sides = $sides;
        $this->rolls = [];
    }
    public function roll() {
        $this->rolls[] = rand(1, $this->sides);
        return end($this->rolls);
    }
    public function getLastRoll() {
        return end($this->rolls);
    }
}
