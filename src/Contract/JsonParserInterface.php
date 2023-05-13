<?php

namespace Cryde\JsonTxtExtractor\Contract;
interface JsonParserInterface
{
    /**
     * Take a string that might contain some JSON and return an array of the JSON strings
     *
     * @param string $text
     *
     * @return string[]
     */
    public function parse(string $text): array;
}