<?php

namespace sihd\Guess;

/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     */
    private $number;
    private $tries;
    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the number if null is sent in.
     *
     * @param int $number The current secret number, default -1 to initiate
     *                    the number from start.
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     * @return void
     */
    public function __construct(int $number = -1, int $tries = 6)
    {
        if ($number === -1) {
            $this->random();
        } else {
            $this->number = $number;
        }
        $this->tries = $tries;
    }
    /**
     * Randomize the secret number between 1 and 100.
     *
     * @return void
     */
    public function random()
    {
        $this->number = rand(1, 100);
        $this->tries = 6;
    }
    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */
    public function tries()
    {
        return $this->tries;
    }
    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */
    public function number()
    {
        return $this->number;
    }
    /**
     * Make a guess, decrease remaining guesses and return a string stating
     * if the guess was correct, too low or to high or if no guesses remains.
     *
     * @throws GuessException when guessed number is out of bounds.
     *
     * @param int $number the guessed number to check
     * @return string as the status of the guess made.
     */
    public function makeGuess($number)
    {
        if ($number == null) {
            throw new GuessException("You forgot to write a number, try again!");
        }
        if ($this->tries > 0) {
            if ($number < 1 || $number > 100) {
                throw new GuessException("The number" . $number ." is out of the range 1-100!");
            } else {
                if ($number == $this->number) {
                    $result = " correct!!";
                    $this->tries -= 1;
                } else if ($number > $this->number) {
                    $result = " too high";
                    $this->tries -= 1;
                } else {
                    $result = " too low";
                    $this->tries -= 1;
                }
                return $result;
            }
        } else {
            return " too late.. Sorry... You are out of tries!";
        }
    }
}
