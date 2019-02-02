<?php

namespace tests\unit;

use Directions\CasesParser;
use PHPUnit\Framework\TestCase;

class CasesParserTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $content
     * @param array $result
     */
    public function test($content, $result): void
    {
        $parser = new CasesParser($content);
        $this->assertEquals($result, $parser->getCases());
    }

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                'content' => file_get_contents('tests/data/1.txt'),
                'result'  => [
                    [
                        '87.342 34.30 start 0 walk 10.0',
                        '2.6762 75.2811 start -45.0 walk 40 turn 40.0 walk 60',
                        '58.518 93.508 start 270 walk 50 turn 90 walk 40 turn 13 walk 5',
                    ],
                    [
                        '30 40 start 90 walk 5',
                        '40 50 start 180 walk 10 turn 90 walk 5',
                    ],
                ],
            ],
            [
                'content' => file_get_contents('tests/data/2.txt'),
                'result'  => [
                    [
                        '87.342 34.30 start 0 walk 10.0',
                        '2.6762 75.2811 start -45.0 walk 40 turn 40.0 walk 60',
                        '58.518 93.508 start 270 walk 50 turn 90 walk 40 turn 13 walk 5',
                    ],
                    [
                        '30 40 start 90 walk 5',
                        '40 50 start 180 walk 10 turn 90 walk 5',
                    ],
                    [
                        '87.342 34.30 start 0 walk 10.0',
                        '2.6762 75.2811 start -45.0 walk 40 turn 40.0 walk 60',
                        '58.518 93.508 start 270 walk 50 turn 90 walk 40 turn 13 walk 5',
                    ],
                    [
                        '30 40 start 90 walk 5',
                        '40 50 start 180 walk 10 turn 90 walk 5',
                    ],
                    [
                        '87.342 34.30 start 0 walk 10.0',
                        '2.6762 75.2811 start -45.0 walk 40 turn 40.0 walk 60',
                        '58.518 93.508 start 270 walk 50 turn 90 walk 40 turn 13 walk 5',
                    ],
                    [
                        '30 40 start 90 walk 5',
                        '40 50 start 180 walk 10 turn 90 walk 5',
                    ],
                ],
            ],
        ];
    }
}
