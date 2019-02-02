<?php

namespace tests\unit\actions\parsers;

use Directions\actions\parsers\ActionParserInterface;
use PHPUnit\Framework\TestCase;

abstract class AbstractActionParserTest extends TestCase
{
    protected $parserClass;

    /**
     * @dataProvider dataProvider
     * @param string $line
     * @param bool $isMatch
     * @param string $newLine
     */
    public function test(string $line, bool $isMatch, string $newLine): void
    {
        /**
         * @var $parser ActionParserInterface
         */
        $parser = new $this->parserClass($line);

        $this->assertEquals($isMatch, $parser->isMatch());

        if ($parser->isMatch()) {
            $this->assertEquals($newLine, $parser->getNewLine());
        }
    }

    abstract public function dataProvider(): array;
}
