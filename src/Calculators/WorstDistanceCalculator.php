<?php

namespace Directions\Calculators;

use Directions\Point;

class WorstDistanceCalculator
{
    /**
     * @param Point $avgPoint
     * @param Point[] $points
     * @return float
     */
    public function getWorthDistancePoint(Point $avgPoint, $points): float
    {
        $distances = [];

        foreach ($points as $point) {
            $distances[] = sqrt(
                ($point->getX() - $avgPoint->getX()) ** 2 + ($point->getY() - $avgPoint->getY()) ** 2
            );
        }

        return max($distances);
    }
}
