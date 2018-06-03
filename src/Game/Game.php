<?php
namespace sihd\Game;

/**
 * Game Class
 */
class Game
{
    private $playerPoints = array();
    private $aiPoints;
    private $roundPoints;
    private $gamestatus;
    private $serie;


    public function __construct($session_game, $roundPoints)
    {
        if ($session_game == null) {
            $this->playerPoints = array();
            $this->aiPoints = array();
            $this->roundPoints = $roundPoints;
            $this->gamestatus = "playerturn";
            $this->serie = array();

        } else {
            $this->playerPoints = $session_game[0];
            $this->aiPoints = $session_game[1];
            $this->roundPoints = $roundPoints;
            $this->gamestatus = "playerturn";
        }

    }
    public function getGameStatus()
    {
        $player = array_sum($this->playerPoints);
        $ai = array_sum($this->aiPoints);
        if ($player > 99 || $ai > 99) {
            $this->gamestatus = "end";
        }
        return $this->gamestatus;
    }
    public function addPoints($player, $points)
    {
        array_push($this->$player, $points);
    }
    public function getTotalPoints()
    {
        $totals = array();
        $totals[] = $this->playerPoints;
        $totals[] = $this->aiPoints;
        return $totals;
    }
    public function getMemory()
    {
        $memory = [];
        array_push($memory, $this->playerPoints);
        array_push($memory, $this->aiPoints);
        array_push($memory, $this->serie);
        return $memory;
    }
    public function roll()
    {
        $dices = array();
        $dice = new Dice();

        for ($i = 0; $i < 2; $i++){
            $value = $dice->roll();
            $dices[] = $value;
            $_SESSION['values'][] = $value;
        }

        if (in_array(1, $dices)) {
            $this->playerPoints[] = 0;
            $this->endRound();
            $this->gamestatus = "computerturn";
        } else {
            $this->roundPoints = $this->roundPoints + array_sum($dices);
            $this->gamestatus = "playerturn";
        }
        return $dices;
    }

    public function computerTurn()
    {
        $count = 0;
        $points = 0;
        $ones = 0;
        while($points < 15){
            $dices = array();
            $dice = new DiceHistogram2();
            $dice = new Dice();
            $value = $dice->roll();
            if($value == 1){
                $points= 0;
                break;
            }

            $points += $value;
            $count++;
        }
        $this->aiPoints[] = $points;
        $this->gamestatus = "playerturn";
    }

    public function getRoundPoints()
    {
        return $this->roundPoints;
    }
    public function takePoints()
    {
        $this->playerPoints[] = $this->roundPoints;
        $this->endRound();
        $this->gamestatus = "computerturn";
    }
    public function endRound()
    {
        $this->roundPoints = 0;
        $_SESSION['values'] = array();
    }

}
