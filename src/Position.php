<?php

namespace Directions;

class Position
{
    /**
     * @var Point
     */
    private $point;

    /**
     * @var float
     */
    private $angle = 0;

    /**
     * Position constructor.
     */
    public function __construct()
    {
        $this->point = new Point(0, 0);
    }

    /**
     * @param float $x
     * @param float $y
     */
    public function setCoordinates(float $x, float $y): void
    {
        $this->point->setX($x);
        $this->point->setY($y);
    }

    /**
     * @param float $angle
     */
    public function setAngle(float $angle): void
    {
        $this->angle = $angle;
    }

    /**
     * @param float $distance
     */
    public function move(float $distance): void
    {
        $point = $this->point;
        $angle = $this->angle;

        $point->setX($point->getX() + $distance * cos(deg2rad($angle)));
        $point->setY($point->getY() + $distance * sin(deg2rad($angle)));
    }

    /**
     * @param float $angle
     */
    public function turn(float $angle): void
    {
        $this->angle += $angle;
    }

    /**
     * @return Point
     */
    public function getPoint(): Point
    {
        return $this->point;
    }
}
