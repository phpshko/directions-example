<?php

namespace Directions\Actions;

use Directions\Position;

class StartAction implements ActionInterface
{
    /**
     * @var float
     */
    private $x;

    /**
     * @var float
     */
    private $y;

    /**
     * @var float
     */
    private $angle;

    public function __construct(float $x, float $y, float $angle)
    {
        $this->x = $x;
        $this->y = $y;
        $this->angle = $angle;
    }

    /**
     * @param Position $position
     */
    public function run(Position $position): void
    {
        $position->setCoordinates($this->x, $this->y);
        $position->setAngle($this->angle);
    }
}
