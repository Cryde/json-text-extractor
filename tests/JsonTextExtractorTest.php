<?php

use Cryde\JsonTxtExtractor\JsonTextExtractor;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class JsonTextExtractorTest extends TestCase
{
    /** @param string[] $result */
    #[DataProvider('stringJsonTestProvider')]
    public function testGetJsonString(string $stringWithJson, array $result): void
    {
        $textJsonExtractor = new JsonTextExtractor($stringWithJson);
        $this->assertSame($result, $textJsonExtractor->getJsonStrings());
    }

    /**
     * @return array<int, array<int, array<int, string>|string>>.
     */
    public static function stringJsonTestProvider(): array
    {
        return [
            ['', []],
            ["{key: value}", []],
            ["{invalidkey: value} {otherinvalidkey: value}", []],
            ['{"key": invalidvalue} {"otherkey": invalidvalue}', []],
            ['{"key": invalidvalue} {"otherkey": "value"}', ['{"otherkey": "value"}']],
            ['{"key": "value"} {"otherkey": "value"}', ['{"key": "value"}', '{"otherkey": "value"}']],
            [
                '
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elit lectus, volutpat eget turpis id, bibendum convallis erat. Ut posuere sapien felis, at ornare elit vulputate ut. 
{{}
Vestibulum egestas, diam suscipit mattis bibendum, nisi arcu ullamcorper justo.


{
  "id": "0001",
  "type": "donut",
  "name": "Cake",
  "ppu": 0.55,
  "batters": {
    "batter": [
      {
        "id": "1001",
        "type": "Regular"
      },
      {
        "id": "1002",
        "type": "Chocolate"
      },
      {
        "id": "1003",
        "type": "Blueberry"
      },
      {
        "id": "1004",
        "type": "Devil\'s Food"
      }
    ]
  },
  "topping": [
    {
      "id": "5001",
      "type": "None"
    },
    {
      "id": "5002",
      "type": "Glazed"
    },
    {
      "id": "5005",
      "type": "Sugar"
    },
    {
      "id": "5007",
      "type": "Powdered Sugar"
    },
    {
      "id": "5006",
      "type": "Chocolate with Sprinkles"
    },
    {
      "id": "5003",
      "type": "Chocolate"
    },
    {
      "id": "5004",
      "type": "Maple"
    }
  ]
}

{"key": "value"} {"otherkey": "value"}
            ', [
                '{}',
                '{
  "id": "0001",
  "type": "donut",
  "name": "Cake",
  "ppu": 0.55,
  "batters": {
    "batter": [
      {
        "id": "1001",
        "type": "Regular"
      },
      {
        "id": "1002",
        "type": "Chocolate"
      },
      {
        "id": "1003",
        "type": "Blueberry"
      },
      {
        "id": "1004",
        "type": "Devil\'s Food"
      }
    ]
  },
  "topping": [
    {
      "id": "5001",
      "type": "None"
    },
    {
      "id": "5002",
      "type": "Glazed"
    },
    {
      "id": "5005",
      "type": "Sugar"
    },
    {
      "id": "5007",
      "type": "Powdered Sugar"
    },
    {
      "id": "5006",
      "type": "Chocolate with Sprinkles"
    },
    {
      "id": "5003",
      "type": "Chocolate"
    },
    {
      "id": "5004",
      "type": "Maple"
    }
  ]
}',
                '{"key": "value"}', '{"otherkey": "value"}',
            ],
            ],
        ];
    }
}