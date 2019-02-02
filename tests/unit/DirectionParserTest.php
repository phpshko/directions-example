<?php

namespace tests\unit;

use Directions\CasesParser;
use Directions\DirectionParser;
use PHPUnit\Framework\TestCase;

class DirectionParserTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param string $line
     * @param array $result
     */
    public function test(string $line, $result): void
    {
        $parser = new DirectionParser($line);
        $finalPoint = $parser->getFinalPoint();
        $this->assertEquals($result, [$finalPoint->getX(), $finalPoint->getY()]);
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                'line' => '30 40 start 90',
                'result' => [30, 40],
            ],
            [
                'line' => '30 40 start 90 walk 5',
                'result' => [30, 45],
            ],
            [
                'line' => '0.0 0 start 0 walk 10',
                'result' => [10, 0],
            ],
            [
                'line' => '0.0 0 start 90 walk 10',
                'result' => [0, 10],
            ],
            [
                'line' => '40 50 start 180 walk 10 turn 90 walk 5',
                'result' => [30, 45],
            ],
        ];
    }
}
