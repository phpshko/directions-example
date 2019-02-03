<?php

namespace Directions\Parsers\Cases;

class CasesParser implements CasesParserInterface
{
    private $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getCases(): array
    {
        $lines = preg_split('/\r\n|\r|\n/', $this->content);

        $cases = [];
        $caseNum = 0;
        $leftLines = array_shift($lines);

        foreach ($lines as $line) {
            if ($leftLines-- <= 0) {
                if ($leftLines === '0') {
                    break;
                }

                $leftLines = $line;
                $caseNum++;
            } else {
                $cases[$caseNum][] = $line;
            }
        }

        return $cases;
    }
}
