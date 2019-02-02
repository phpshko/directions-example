<?php

namespace Directions\actions\parsers;

use Directions\actions\ActionInterface;
use Directions\actions\TurnAction;

class TurnActionParser extends AbstractRegexActionParser
{
    protected $pattern = '/^turn\s([\d.\-]+)/';

    public function getAction(): ActionInterface
    {
        [$angle] = $this->getMatches();
        return new TurnAction((float)$angle);
    }
}
