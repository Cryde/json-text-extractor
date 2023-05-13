<?php

namespace Cryde\JsonTxtExtractor;
class JsonTextExtractor
{
    /**
     * @return string[]
     */
    public function getJsonStrings(string $text): array
    {
        preg_match_all('#\{(?:[^{}]|(?R))*\}#s', $text, $matches);
        $finalValidJson = [];
        foreach ($matches[0] as $match) {
            if (json_validate($match)) {
                $finalValidJson[] = $match;
            }
        }

        return $finalValidJson;
    }
}