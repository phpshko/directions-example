<?php

namespace Directions\actions;

use Directions\Position;

class TurnAction implements ActionInterface
{
    /**
     * @var float
     */
    private $angle;

    public function __construct(float $angle)
    {
        $this->angle = $angle;
    }

    /**
     * @param Position $position
     */
    public function run(Position $position): void
    {
        $position->turn($this->angle);
    }
}
