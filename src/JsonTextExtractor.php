<?php

namespace Cryde\JsonTxtExtractor;

use Cryde\JsonTxtExtractor\Contract\JsonParserInterface;
use Cryde\JsonTxtExtractor\Contract\JsonValidatorInterface;
use Cryde\JsonTxtExtractor\Parser\DefaultJsonParser;
use Cryde\JsonTxtExtractor\Validator\DefaultJsonValidator;

class JsonTextExtractor
{
    public function __construct(
        private readonly JsonParserInterface    $jsonParser = new DefaultJsonParser(),
        private readonly JsonValidatorInterface $jsonValidator = new DefaultJsonValidator()
    ) {
    }

    /**
     * @return string[]
     */
    public function getJsonStrings(string $text): array
    {
        $potentialJsonStrings = $this->jsonParser->parse($text);
        $finalValidJson = [];
        foreach ($potentialJsonStrings as $jsonString) {
            if ($this->jsonValidator->isValid($jsonString)) {
                $finalValidJson[] = $jsonString;
            }
        }

        return $finalValidJson;
    }
}