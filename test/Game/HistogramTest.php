<?php
namespace sihd\Game;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class HistogramTest extends TestCase
{
    /**
     * Construct object and verify that the object has the expected
     * properties. Use no arguments.
     */
    public function testCreateObject()
    {
        $histogram = new Histogram();
        $this->assertInstanceOf("\sihd\Game\Histogram", $histogram);
        $res = $histogram->getSerie();
        $this->assertInternalType("array", $res);
    }
}
