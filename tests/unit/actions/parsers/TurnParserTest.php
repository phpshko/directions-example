<?php

namespace tests\unit\actions\parsers;

use Directions\actions\parsers\TurnActionParser;

class TurnParserTest extends AbstractActionParserTest
{
    protected $parserClass = TurnActionParser::class;

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                'line'    => 'turn 90.10 walk 10.0',
                'isMatch' => true,
                'newLine' => 'walk 10.0',
            ],
            [
                'line'    => 'turn 90 walk 10.0',
                'isMatch' => true,
                'newLine' => 'walk 10.0',
            ],
            [
                'line'    => 'walk 10.0 turn 90',
                'isMatch' => false,
                'newLine' => 'walk 10.0 turn 90',
            ],
            [
                'line'    => 'not valid turn 10.0',
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
