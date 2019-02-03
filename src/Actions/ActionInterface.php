<?php

namespace Directions\Actions;

use Directions\Position;

interface ActionInterface
{
    public function run(Position $position);
}
