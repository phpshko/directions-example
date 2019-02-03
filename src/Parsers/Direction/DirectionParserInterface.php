<?php

namespace Directions\Parsers\Direction;

use Directions\Point;

interface DirectionParserInterface
{
    public function getFinalPoint(): Point;
}
