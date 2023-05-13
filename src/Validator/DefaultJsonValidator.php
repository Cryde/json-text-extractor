<?php

namespace Cryde\JsonTxtExtractor\Validator;

use Cryde\JsonTxtExtractor\Contract\JsonValidatorInterface;

class DefaultJsonValidator implements JsonValidatorInterface
{
    public function isValid(string $json): bool
    {
        return json_validate($json);
    }
}