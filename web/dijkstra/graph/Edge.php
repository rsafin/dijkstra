<?php

namespace Graph;

/**
 * Class Edge
 * @package Graph
 */
class Edge
{
    /**
     * @var $weight int
     */
    private $weight;

    /**
     * @var $target int
     */
    private $target;

    /**
     * Edge constructor.
     * @param int $target
     * @param int $weight
     */
    public function __construct(int $target, int $weight)
    {
        $this->setTarget($target);
        $this->setWeight($weight);
    }

    /**
     * @return int
     */
    public function getWeight() : int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight(int $weight) : void
    {
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getTarget() : int
    {
        return $this->target;
    }


    /**
     * @param int $target
     */
    public function setTarget(int $target) : void
    {
        $this->target = $target;
    }
}