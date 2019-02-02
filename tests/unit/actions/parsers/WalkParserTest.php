<?php

namespace tests\unit\actions\parsers;

use Directions\actions\parsers\WalkActionParser;

class WalkParserTest extends AbstractActionParserTest
{
    protected $parserClass = WalkActionParser::class;

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                'line'    => 'walk 10.0 turn 90',
                'isMatch' => true,
                'newLine' => 'turn 90',
            ],
            [
                'line'    => 'walk 60 turn 90',
                'isMatch' => true,
                'newLine' => 'turn 90',
            ],
            [
                'line'    => 'turn 90 walk 10.0',
                'isMatch' => false,
                'newLine' => 'turn 90 walk 10.0',
            ],
            [
                'line'    => 'not valid walk 10.0',
                'isMatch' => false,
                'newLine' => 'not valid walk 10.0',
            ],
            [
                'line'    => '',
                'isMatch' => false,
                'newLine' => '',
            ],
        ];
    }
}
