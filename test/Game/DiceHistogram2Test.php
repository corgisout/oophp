<?php
namespace sihd\Game;
use PHPUnit\Framework\TestCase;
/**
 * Test cases for class Guess.
 */
class DiceHistogram2Test extends TestCase
{
    public function testCreateObject()
    {
        $diceHistogram2 = new DiceHistogram2();
        $res = $diceHistogram2->getHistogramMax();
        $this->assertInstanceOf("\sihd\Game\DiceHistogram2", $diceHistogram2);
        $this->assertEquals(6, $res);
    }


    public function testSetSerie()
    {
        $diceHistogram2 = new DiceHistogram2();
        $serie = [3, 4, 7, 8, 5];
        $diceHistogram2->setSerie($serie);
        $this->assertInstanceOf("\sihd\Game\DiceHistogram2", $diceHistogram2);
        $this->assertEquals(5, count($diceHistogram2->getHistogramserie()));
    }

    public function testgetHistogramMin()
    {
        $diceHistogram2 = new DiceHistogram2();
        $res = $diceHistogram2->getHistogramMin();
        $this->assertInstanceOf("\sihd\Game\DiceHistogram2", $diceHistogram2);
        $this->assertEquals(1, $res);
    }
    public function testroll()
    {
        $diceHistogram2 = new DiceHistogram2();
        $res = $diceHistogram2->roll();
        $this->assertInstanceOf("\sihd\Game\DiceHistogram2", $diceHistogram2);
        $this->assertEquals($diceHistogram2->getLastRoll(), $res);
    }
}
