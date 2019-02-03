<?php

namespace Directions\Parsers\Actions;

use Directions\Actions\ActionInterface;
use Directions\Actions\TurnAction;

class TurnActionParser extends AbstractRegexActionParser
{
    protected $pattern = '/^turn\s([\d.\-]+)/';

    public function getAction(): ActionInterface
    {
        [$angle] = $this->getMatches();
        return new TurnAction((float)$angle);
    }
}
