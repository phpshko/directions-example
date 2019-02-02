<?php

namespace Directions\actions\parsers;

use Directions\actions\WalkAction;
use Directions\actions\ActionInterface;

class WalkActionParser extends AbstractRegexActionParser
{
    protected $pattern = '/^walk\s([\d.\-]+)/';

    public function getAction(): ActionInterface
    {
        [$distance] = $this->getMatches();
        return new WalkAction((float)$distance);
    }
}
