<?php

namespace Graph\Dijkstra;

use Graph\Edge;
use Graph\Graph;

/**
 * Class Dijkstra
 * @package Graph\Dijkstra
 */
class Dijkstra
{
    /**
     * @var $dijkstraGraph Graph
     */
    private $dijkstraGraph;

    public function __construct($graph)
    {
        $this->dijkstraGraph = $this->copyGraph($graph);
    }


    public function perform(int $start, int $target) : array
    {
        /**
         * @var $startNode Node
         */
        $startNode = $this->dijkstraGraph->getNodeByNumber($start);
        $startNode->setWeight(0);
        $nextNode = $startNode;

        while ($nextNode !== null) {
            $nextNode = $this->calculateNodeAndReturnNext($nextNode);
        }

        return array_reverse($this->resolvePath($target));
    }

    /**
     * @param Node $node
     * @return Node|mixed|null
     */
    private function calculateNodeAndReturnNext(Node &$node)
    {
        $minWeightNode = null;
        $minWeight = INF;
        foreach ($node->getEdges() as $edge) {
            /**
             * @var $edge Edge
             * @var $edgeTargetNode Node
             */
            $edgeTargetNode = $this->dijkstraGraph->getNodeByNumber($edge->getTarget());

            if (!$edgeTargetNode->isCompleted()) {
                $newWeight = $edge->getWeight() + $node->getWeight();

                if ($newWeight < $edgeTargetNode->getWeight()) {
                    $edgeTargetNode->setWeight($newWeight);
                }

                if ($edgeTargetNode->getWeight() < $minWeight) {
                    $minWeight = $edgeTargetNode->getWeight();
                    $minWeightNode = $edgeTargetNode;
                }
            }
        }

        $node->complete();
        return $minWeightNode;
    }

    private function resolvePath(int $target) : array
    {
        $path = [];
        /**
         * @var $nextNode Node
         */
        $nextNode = $this->dijkstraGraph->getNodeByNumber($target);

        while ($nextNode !== null) {
            $path[] = $nextNode->getNumber();
            $nextNode = $this->getNextNodeForPath($nextNode);
        }

        return $path;
    }

    /**
     * @param Node $node
     * @return Node|mixed|null
     */
    private function getNextNodeForPath(Node $node)
    {
        foreach ($node->getEdges() as $edge) {
            /**
             * @var $edge Edge
             * @var $edgeTargetNode Node
             */
            $edgeTargetNode = $this->dijkstraGraph->getNodeByNumber($edge->getTarget());

            if ($node->getWeight() - $edge->getWeight() == $edgeTargetNode->getWeight())
            {
                return $edgeTargetNode;
            }
        }

        return null;
    }

    /**
     * @param Graph $graph
     * @return Graph
     */
    private function copyGraph(Graph $graph) : Graph
    {
        $dijkstraGraph = new Graph();
        $nodes = $graph->getNodes();

        foreach ($nodes as $node) {
            /**
             * @var $node \Graph\Dijkstra\Node
             */
            $dijkstraNode = new Node($node->getNumber(), self::sortEdges($node->getEdges()), INF);
            $dijkstraGraph->addNode($dijkstraNode);
        }

        return $dijkstraGraph;
    }

    /**
     * функция должна сортировать ребра по весу (но не делает ничего)
     * @param array $edges
     * @return array
     */
    private function sortEdges(array $edges) : array
    {
        return $edges;
    }
}