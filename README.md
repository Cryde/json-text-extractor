
# Json Text Extractor

Small library that will help extract JSON from plain text



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


$textJsonExtractor = new JsonTextExtractor($str);

var_dump($textJsonExtractor->getJsonStrings());
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


## Feedback / Bugs

If you have any feedback, please open an issue.  
I may not have covered all cases. If you have one not covered add it to your issue.  
Do not hesitate to open an issue if you have an idea to improve this small library.