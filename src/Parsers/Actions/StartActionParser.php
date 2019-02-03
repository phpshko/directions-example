<?php

namespace Directions\Parsers\Actions;

use Directions\Actions\ActionInterface;
use Directions\Actions\StartAction;

class StartActionParser extends AbstractRegexActionParser
{
    protected $pattern = '/^([\d.\-]+)\s([\d.\-]+)\sstart\s([\d.\-]+)/';

    public function getAction(): ActionInterface
    {
        [$x, $y, $angle] = $this->getMatches();
        return new StartAction((float)$x, (float)$y, (float)$angle);
    }
}
