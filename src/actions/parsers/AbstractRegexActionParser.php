<?php

namespace Directions\actions\parsers;

abstract class AbstractRegexActionParser implements ActionParserInterface
{
    /**
     * @var string
     */
    protected $pattern;

    /**
     * @var string
     */
    protected $line;

    public function __construct(string $line)
    {
        $this->line = $line;
    }

    public function isMatch(): bool
    {
        return preg_match($this->pattern, $this->line);
    }

    public function getNewLine(): string
    {
        return trim(preg_replace($this->pattern, '', $this->line, 1));
    }

    protected function getMatches(): array
    {
        preg_match($this->pattern, $this->line, $matches);
        array_shift($matches);
        return $matches;
    }
}
