<?php

use Cryde\JsonTxtExtractor\JsonTextExtractor;

include "vendor/autoload.php";

$str = <<<STR
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elit lectus, volutpat eget turpis id, bibendum convallis erat. Ut posuere sapien felis, at ornare elit vulputate ut. 
Vestibulum egestas, diam suscipit mattis bibendum, nisi arcu ullamcorper justo.

{
  "id": "0001",
  "type": "donut",
  "name": "Cake",
  "topping": [
    {
      "id": "5001",
      "type": "None"
    },
    {
      "id": "5002",
      "type": "Glazed"
    }
  ]
}

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elit lectus, volutpat eget turpis id, bibendum convallis erat. Ut posuere sapien felis, at ornare elit vulputate ut. 
Vestibulum egestas, diam suscipit mattis bibendum, nisi arcu ullamcorper justo.

{"key": "value"}
Vestibulum egestas, diam suscipit mattis bibendum, nisi arcu ullamcorper justo.
STR;


$textJsonExtractor = new JsonTextExtractor($str);

var_dump($textJsonExtractor->getJsonStrings());