<?php

namespace Graph;

/**
 * Class GraphFactory
 * @package Graph
 */
class GraphFactory
{
    /**
     * @param string $json
     * @return Graph
     */
    public static function createFromJson(string $json) : Graph
    {
        if (self::validateJson($json)) {
            $graph = new Graph();

            $rawGraph = json_decode($json, true);

            foreach ($rawGraph as $rawNodes) {
                $node = new Node($rawNodes['number']);
                foreach ($rawNodes['edges'] as $rawEdge) {
                    $edge = new Edge($rawEdge['target'], $rawEdge['weight']);
                    $node->addEdge($edge);
                }
                $graph->addNode($node);
            }

            return $graph;
        } else {
            throw new \InvalidArgumentException();
        }
    }

    /**
     * Некая прверка проверяющая, что граф валиден (которая успешно не реализована)
     *
     * @param $json
     * @return bool
     */
    private static function validateJson($json) : bool
    {
        return true;
    }
}