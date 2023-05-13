<?php

namespace Cryde\JsonTxtExtractor\Contract;
interface JsonValidatorInterface
{
    public function isValid(string $json): bool;
}