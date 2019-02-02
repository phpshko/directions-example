<?php

namespace Directions;

class AveragePointCalculator
{
    /**
     * @param Point[] $points
     * @return Point
     */
    public function getAveragePoint($points): Point
    {
        $xSum = 0;
        $ySum = 0;

        foreach ($points as $point) {
            $xSum += $point->getX();
            $ySum += $point->getY();
        }

        return new Point(
            $xSum / count($points),
            $ySum / count($points)
        );
    }
}
