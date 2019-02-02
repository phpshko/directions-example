<?php

namespace Directions\actions;

use Directions\Position;

class WalkAction implements ActionInterface
{
    /**
     * @var float
     */
    private $distance;

    public function __construct(float $distance)
    {
        $this->distance = $distance;
    }

    /**
     * @param Position $position
     */
    public function run(Position $position): void
    {
        $position->move($this->distance);
    }
}
