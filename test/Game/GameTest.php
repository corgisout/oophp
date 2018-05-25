<?php
namespace sihd\Game;
use PHPUnit\Framework\TestCase;
/**
 * Test cases for class Guess.
 */
class GameTest extends TestCase
{
    public function testFinishGame()
    {
        $gameSession = [[16, 2, 5, 99], [12, 14, 7, 11]];
        $game = new Game($gameSession, 12);
        $this->assertInstanceOf("\sihd\Game\Game", $game);
        $res = $game->getGameStatus();
        $exp = "end";
        $this->assertEquals($res, $exp);
    }

    public function testgetRoundPoints()
    {
        $gameSession = [[12],[15]];
        $game = new Game($gameSession, 12);
        $this->assertInstanceOf("\sihd\Game\Game", $game);
        $exp = 12;
        $this->assertEquals($exp, $game->getRoundPoints());

    }

    public function testTakePoints()
    {
        $gameSession = [[14], [23],];
        $game = new Game($gameSession, 12);
        $this->assertInstanceOf("\sihd\Game\Game", $game);
        $game->roll();
        $game->takePoints();
        $this->assertEquals($game->getGameStatus(), "computerturn");
    }
    public function testGetTotalPoints()
    {
        $gameSession = [[5, 15], [20, 25]];
        $game = new Game($gameSession, 1);
        $this->assertInstanceOf("\sihd\Game\Game", $game);
        $res = $game->getTotalPoints();
        $this->assertEquals(20, array_sum($res[0]));
        $this->assertEquals(45, array_sum($res[1]));
    }

}
