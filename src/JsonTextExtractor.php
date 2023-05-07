<?php

namespace Cryde\JsonTxtExtractor;
class JsonTextExtractor
{
    public function __construct(private readonly string $text)
    {
    }

    /**
     * @return string[]
     */
    public function getJsonStrings(): array
    {
        preg_match_all('#\{(?:[^{}]|(?R))*\}#s', $this->text, $matches);
        $finalValidJson = [];
        foreach ($matches[0] as $match) {
            if (json_validate($match)) {
                $finalValidJson[] = $match;
            }
        }

        return $finalValidJson;
    }
}