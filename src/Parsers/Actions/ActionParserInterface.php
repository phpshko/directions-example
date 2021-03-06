<?php

namespace Directions\Parsers\Actions;

use Directions\Actions\ActionInterface;

interface ActionParserInterface
{
    public function __construct(string $line);

    public function isMatch(): bool;

    /**
     * Get new line, after remove matched substring
     * @return string
     */
    public function getNewLine(): string;

    public function getAction(): ActionInterface;
}
