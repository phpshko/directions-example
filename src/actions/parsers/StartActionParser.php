<?php

namespace Directions\actions\parsers;

use Directions\actions\ActionInterface;
use Directions\actions\StartAction;

class StartActionParser extends AbstractRegexActionParser
{
    protected $pattern = '/^([\d\.\-]+)\s([\d\.\-]+)\sstart\s([\d\.\-]+)/';

    public function getAction(): ActionInterface
    {
        [$x, $y, $angle] = $this->getMatches();
        return new StartAction((float)$x, (float)$y, (float)$angle);
    }
}
