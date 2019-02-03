<?php

namespace Tests\Unit\Parsers\Actions;

use Directions\Parsers\Actions\StartActionParser;

class StartActionParserTest extends AbstractActionParserTest
{
    protected $parserClass = StartActionParser::class;

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                'line'    => '87.342 34.30 start 0 walk 10.0 87.342 34.30 start 0',
                'isMatch' => true,
                'newLine' => 'walk 10.0 87.342 34.30 start 0',
            ],
            [
                'line'    => '10 20 start 0 walk 10.0 87.342 34.30 start 0',
                'isMatch' => true,
                'newLine' => 'walk 10.0 87.342 34.30 start 0',
            ],
            [
                'line'    => 'not valid 87.342 34.30 start 0 walk 10.0 87.342 34.30 start 0',
                'isMatch' => false,
                'newLine' => 'not valid 87.342 34.30 start 0 walk 10.0 87.342 34.30 start 0',
            ],
            [
                'line'    => '',
                'isMatch' => false,
                'newLine' => '',
            ],
        ];
    }
}
