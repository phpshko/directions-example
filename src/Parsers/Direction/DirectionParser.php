<?php

namespace Directions\Parsers\Direction;

use Directions\DirectionException;
use Directions\Parsers\Actions\ActionParserInterface;
use Directions\Parsers\Actions\StartActionParser;
use Directions\Parsers\Actions\TurnActionParser;
use Directions\Parsers\Actions\WalkActionParser;
use Directions\Point;
use Directions\Position;

class DirectionParser implements DirectionParserInterface
{
    private $line;
    private $position;

    private $actionParserClasses = [
        TurnActionParser::class,
        WalkActionParser::class,
    ];

    public function __construct(string $line)
    {
        $this->line = $line;
        $this->position = new Position();
    }

    /**
     * Get final point after apply all actions
     * @return Point
     */
    public function getFinalPoint(): Point
    {
        $this->startAction();

        while (!empty($this->line)) {
            $isMatch = false;

            foreach ($this->actionParserClasses as $actionParserClass) {
                /** @var ActionParserInterface $actionParser */
                $actionParser = new $actionParserClass($this->line);

                if ($actionParser->isMatch()) {
                    $isMatch = true;
                    $this->applyActionParser($actionParser);
                    break;
                }
            }

            if (!$isMatch && !empty($this->line)) {
                throw new DirectionException('Line of direction is not correct format');
            }
        }

        return $this->position->getPoint();
    }

    /**
     * Line must begin with StartActionParser
     */
    private function startAction(): void
    {
        $actionParser = new StartActionParser($this->line);

        if (!$actionParser->isMatch()) {
            throw new DirectionException('Begin line of direction must be compatible with StartActionParser');
        }

        $this->applyActionParser($actionParser);
    }

    private function applyActionParser(ActionParserInterface $actionParser): void
    {
        $this->line = $actionParser->getNewLine();

        $action = $actionParser->getAction();
        $action->run($this->position);
    }
}
