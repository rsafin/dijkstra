<?php

namespace Graph\Dijkstra;

class Node extends \Graph\Node
{
    /**
     * @var $weight int
     */
    private $weight;

    private $completed = false;

    /**
     * Node constructor.
     * @param int $number
     * @param array $edges
     * @param int $weight
     */
    public function __construct(int $number, array $edges = [], $weight = 0)
    {
        $this->weight = $weight;

        parent::__construct($number, $edges);
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return bool
     */
    public function isCompleted() : bool
    {
        return $this->completed;
    }

    public function complete()
    {
        $this->completed = true;
    }

}