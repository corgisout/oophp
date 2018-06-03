<?php
namespace sihd\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceTest extends TestCase
{
    public function testRoll()
    {
        $dice = new Dice();
        $this->assertInstanceOf("\sihd\Game\Dice", $dice);
        $res = $dice->roll();
        $exp = $dice->getLastRoll();
        $this->assertEquals($exp, $res);
    }
}
