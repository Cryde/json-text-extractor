
# Json Text Extractor

Small library that will help extract JSON from plain text

## Installation 

```
composer require cryde/json-text-extractor
```

## Usage

The usage is pretty straightforward.

```php
use Cryde\JsonTxtExtractor\JsonTextExtractor;

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


$textJsonExtractor = new JsonTextExtractor();

var_dump($textJsonExtractor->getJsonStrings($str));
/*
array(2) {
  [0] =>
  string(184) "{
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
}"
  [1] =>
  string(16) "{"key": "value"}"
}

*/
```

## Use cases

- extract JSON from strings returned by ChatGPT : sometimes (even though you explicit asked to not do that) it will add some explanations around the JSON returned
- tell me if you have other use cases

## Feedback / Bugs

If you have any feedback, please open an issue.  
I may not have covered all cases. If you have one not covered add it to your issue.  
Do not hesitate to open an issue if you have an idea to improve this small library.