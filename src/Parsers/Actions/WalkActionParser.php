<?php

namespace Directions\Parsers\Actions;

use Directions\Actions\WalkAction;
use Directions\Actions\ActionInterface;

class WalkActionParser extends AbstractRegexActionParser
{
    protected $pattern = '/^walk\s([\d.\-]+)/';

    public function getAction(): ActionInterface
    {
        [$distance] = $this->getMatches();
        return new WalkAction((float)$distance);
    }
}
