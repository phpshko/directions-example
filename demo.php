<?php

use Directions\Calculators\AveragePointCalculator;
use Directions\Calculators\WorstDistanceCalculator;
use Directions\Parsers\Cases\CasesParser;
use Directions\Parsers\Direction\DirectionParser;

error_reporting(E_ALL);

require_once 'vendor/autoload.php';

$filePath = $argv[1] ?? null;

if (!$filePath || !file_exists($filePath)) {
    die("File {$filePath} not exists");
}

$fileContent = file_get_contents($filePath);

$casesParser = new CasesParser($fileContent);

foreach ($casesParser->getCases() as $directions) {
    $points = [];

    foreach ($directions as $direction) {
        $directionParser = new DirectionParser($direction);

        $points[] = $directionParser->getFinalPoint();
    }

    $avgPointCalculator = new AveragePointCalculator;
    $avgPoint = $avgPointCalculator->getAveragePoint($points);

    $worstDistanceCalculator = new WorstDistanceCalculator();
    $worthDistance = $worstDistanceCalculator->getWorthDistancePoint($avgPoint, $points);

    $x = round($avgPoint->getX(), 4);
    $y = round($avgPoint->getY(), 4);
    $worthDistance = round($worthDistance, 4);

    echo "{$x} {$y} {$worthDistance}" . PHP_EOL;
}
