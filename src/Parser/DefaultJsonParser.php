<?php

namespace Cryde\JsonTxtExtractor\Parser;

use Cryde\JsonTxtExtractor\Contract\JsonParserInterface;

class DefaultJsonParser implements JsonParserInterface
{
    public function parse(string $text): array
    {
        preg_match_all('#\{(?:[^{}]|(?R))*\}#s', $text, $matches);

        return $matches[0];
    }
}