<?php

namespace tests\unit;

use Directions\Position;
use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param array $steps
     * @param array $result
     */
    public function test($steps, $result): void
    {
        $position = new Position();

        foreach ($steps as $step) {
            [$methodName, $arguments] = $step;

            $position->{$methodName}(...$arguments);
        }

        $point = $position->getPoint();

        $this->assertEquals($result, [round($point->getX(), 2), round($point->getY(), 2)]);
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                'steps'  => [
                    ['setCoordinates', [0, 0]],
                    ['turn', [0]],
                    ['move', [10]],
                ],
                'result' => [10, 0],
            ],
            [
                'steps'  => [
                    ['setCoordinates', [0, 0]],
                    ['turn', [90]],
                    ['move', [10]],
                ],
                'result' => [0, 10],
            ],
            [
                'steps'  => [
                    ['setCoordinates', [0, 0]],
                    ['turn', [-90]],
                    ['move', [10]],
                ],
                'result' => [0, -10],
            ],
            [
                'steps'  => [
                    ['setCoordinates', [0, 0]],
                    ['turn', [180]],
                    ['move', [10]],
                ],
                'result' => [-10, 0],
            ],
            [
                'steps'  => [
                    ['setCoordinates', [0, 0]],
                    ['turn', [135]],
                    ['move', [10]],
                ],
                'result' => [-7.07, 7.07],
            ],
            [
                'steps'  => [
                    ['setCoordinates', [30, 40]],
                    ['turn', [90]],
                    ['move', [5]],
                ],
                'result' => [30, 45],
            ],
            [
                'steps'  => [
                    ['setCoordinates', [40, 50]],
                    ['turn', [180]],
                    ['move', [10]],
                    ['turn', [90]],
                    ['move', [5]],
                ],
                'result' => [30, 45],
            ],
        ];
    }
}
