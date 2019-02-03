<?php

namespace Tests\Unit\Calculators;

use Directions\Calculators\WorstDistanceCalculator;
use Directions\Point;
use PHPUnit\Framework\TestCase;

class WorstDistanceCalculatorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param Point $avgPoint
     * @param $points
     * @param array $result
     */
    public function test(Point $avgPoint, $points, $result): void
    {
        $calculator = new WorstDistanceCalculator();

        $this->assertEquals($result, $calculator->getWorthDistancePoint($avgPoint, $points));
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                'avgPoint' => new Point(0, 0),
                'points'   => [
                    new Point(0, 0),
                    new Point(5, 0),
                    new Point(10, 0),
                    new Point(3, 3),
                ],
                'result'   => 10,
            ],
            [
                'avgPoint' => new Point(0, 0),
                'points'   => [
                    new Point(0, 0),
                    new Point(5, 0),
                    new Point(0, 15),
                    new Point(3, 3),
                ],
                'result'   => 15,
            ],
        ];
    }
}
