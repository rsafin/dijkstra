<?php

require __DIR__ . '/vendor/autoload.php';

use Graph\GraphFactory;
use Graph\Dijkstra\Dijkstra;

$json = '[
  {
    "number": 1,
    "edges": [
      {"target": 2, "weight": 7},
      {"target": 3, "weight": 9},
      {"target": 6, "weight": 14}
    ]
  },
  {
    "number": 2,
    "edges": [
      {"target": 1, "weight": 7},
      {"target": 3, "weight": 10},
      {"target": 4, "weight": 15}
    ]
  },
  {
    "number": 3,
    "edges": [
      {"target": 6, "weight": 2},
      {"target": 1, "weight": 9},
      {"target": 2, "weight": 10},
      {"target": 4, "weight": 11}
    ]
  },
  {
    "number": 4,
    "edges": [
      {"target": 5, "weight": 6},
      {"target": 3, "weight": 11},
      {"target": 2, "weight": 15}
    ]
  },
  {
    "number": 5,
    "edges": [
      {"target": 6, "weight": 9},
      {"target": 4, "weight": 6}
    ]
  },
  {
    "number": 6,
    "edges": [
      {"target": 1, "weight": 14},
      {"target": 3, "weight": 2},
      {"target": 5, "weight": 9}
    ]
  }
]';

$graph = GraphFactory::createFromJson($json);

$dijkstra = new Dijkstra($graph);
$solution = $dijkstra->perform(1, 6);

dd($solution);


function dd($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    die();
}