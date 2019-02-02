<?php

namespace Directions;

interface DirectionParserInterface
{
    public function getFinalPoint(): Point;
}
