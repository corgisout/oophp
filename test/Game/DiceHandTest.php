<?php
namespace sihd\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class DiceHandTest extends TestCase
{
    public function testCreateObject()
    {
        $dicehand = new DiceHand();
        $dicehand->rolls();
        $this->assertInstanceOf("\sihd\Game\DiceHand", $dicehand);
        $res = count($dicehand->Getvalues());
        $this->assertEquals($res, 1);
    }
}
