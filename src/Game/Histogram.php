<?php

namespace sihd\Game;

/**
 * Generating histogram data.
 */
class Histogram
{
    /**
     * @var array $serie  The numbers stored in sequence.
     * @var int   $min    The lowest possible number.
     * @var int   $max    The highest possible number.
     */
    private $serie = [];
    private $min;
    private $max;

    /**
     * Inject the object to use as base for the histogram data.
     *
     * @param HistogramInterface $object The object holding the serie.
     *
     * @return void.
     */
    public function injectData(HistogramInterface $object)
    {
        $this->serie = $object->getHistogramSerie();
        $this->min   = $object->getHistogramMin();
        $this->max   = $object->getHistogramMax();
    }

    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getSerie()
    {
        return $this->serie;
    }



    /**
     * Return a string with a textual representation of the histogram.
     *
     * @return string representing the histogram.
     */
    public function getAsText()
    {
        $str = "";
        $counts = array_count_values($this->serie);
        for($i = ($this->min !== null ? $this->min : 1); $i <= ($this->max !== null ? $this->max : 6);$i++) {
            if(isset($counts[$i]) || ($this->min !== null && $this->max !== null)) {
                $str .= $i . " ";
                for ($j = 0;(isset($counts[$i]) && $j < $counts[$i]); $j++)
                    $str .= "*";
                    $str .= "<br>";
            }
        }
        return $str;
    }
}
