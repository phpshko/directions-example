<?php

namespace Directions\actions;

use Directions\Position;

interface ActionInterface
{
    public function run(Position $position);
}
