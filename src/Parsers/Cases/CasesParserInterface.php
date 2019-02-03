<?php

namespace Directions\Parsers\Cases;

interface CasesParserInterface
{
    /**
     * Return array of array lines (directions)
     * @return array
     */
    public function getCases(): array;
}
