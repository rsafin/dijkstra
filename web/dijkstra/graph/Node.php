<?php
namespace Graph;

use OutOfRangeException;

/**
 * Class Node
 * @package Graph
 */
class Node
{
    /**
     * @var $number int
     */
    private $number;

    /**
     * @var $edges array
     */
    private $edges;

    /**
     * Node constructor.
     * @param int $number
     * @param array $edges
     */
    public function __construct(int $number, array $edges = [])
    {
        $this->setNumber($number);
        $this->setEdges($edges);
    }

    /**
     * @return int
     */
    public function getNumber() : int
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber(int $number) : void
    {
        $this->number = $number;
    }

    /**
     * @return array
     */
    public function getEdges() : array
    {
        return $this->edges;
    }

    /**
     * @param Edge $edge
     */
    public function addEdge(Edge $edge) : void
    {
        $numberTargetNode = $edge->getTarget();

        $this->edges[$numberTargetNode] = $edge;
    }

    /**
     * @param array $edges
     */
    public function setEdges(array $edges) : void
    {
        $this->edges = $edges;
    }

    /**
     * @param int $targetNumber
     */
    public function removeEdge(int $targetNumber) : void
    {
        if (array_key_exists($targetNumber, $this->edges)) {
            unset($this->edges[$targetNumber]);
        } else {
            throw new OutOfRangeException("Edge with target number" . $targetNumber . "not exist!");
        }
    }

}