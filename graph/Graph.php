<?php

namespace Graph;

use OutOfRangeException;

/**
 * Class Graph
 * @package Graph
 */
class Graph
{
    /**
     * @var $nodes array
     */
    private $nodes;

    /**
     * @return array
     */
    public function getNodes() : array
    {
        return $this->nodes;
    }

    /**
     * @param int $number
     * @return mixed
     */
    public function getNodeByNumber(int $number) : Node
    {
        return $this->nodes[$number];
    }

    /**
     * @param Node $node
     */
    public function addNode(Node $node) : void
    {
        $this->nodes[$node->getNumber()] = $node;
    }

    /**
     * @param array $nodes
     */
    public function setNodes(array $nodes) : void
    {
        $this->nodes = $nodes;
    }

    /**
     * @param int $nodeNumber
     */
    public function removeNode(int $nodeNumber) : void
    {
        if (array_key_exists($nodeNumber, $this->nodes)) {
            unset($this->nodes[$nodeNumber]);
        } else {
            throw new OutOfRangeException("Node with target number" . $nodeNumber . "not exist!");
        }
    }

}