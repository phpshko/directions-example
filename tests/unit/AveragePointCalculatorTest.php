<?php

namespace tests\unit;

use Directions\AveragePointCalculator;
use Directions\Point;
use PHPUnit\Framework\TestCase;

class AveragePointCalculatorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param array $points
     * @param array $result
     */
    public function test(array $points, array $result): void
    {
        $calculator = new AveragePointCalculator();
        $point = $calculator->getAveragePoint($points);

        $this->assertEquals($result, [$point->getX(), $point->getY()]);
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                'points' => [
                    new Point(-5, -5),
                    new Point(5, -5),
                    new Point(-5, 5),
                    new Point(5, 5),
                ],
                'result' => [0, 0],
            ],
            [
                'points' => [
                    new Point(15, 0),
                    new Point(5, 0),
                    new Point(10, 5),
                    new Point(10, -5),
                ],
                'result' => [10, 0],
            ],
            [
                'points' => [
                    new Point(0, 15),
                    new Point(0, 5),
                    new Point(5, 10),
                    new Point(-5, 10),
                ],
                'result' => [0, 10],
            ],
        ];
    }
}
