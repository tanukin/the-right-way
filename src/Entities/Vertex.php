<?php

namespace Algorithm\Entities;

class Vertex
{
    /**
     * @var int
     */
    private $from;

    /**
     * @var int
     */
    private $to;

    /**
     * @var int
     */
    private $weight;

    /**
     * Vertex constructor.
     *
     * @param int $from
     * @param int $weight
     */
    public function __construct(int $from, int $weight)
    {
        $this->from = $from;
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getFrom(): int
    {
        return $this->from;
    }

    /**
     * @param int $to
     *
     * @return Vertex
     */
    public function setTo(int $to): Vertex
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     *
     * @return int
     */
    public function setWeight(int $weight): int
    {
        if ($this->weight > $weight || $this->weight == -1) {
            $this->weight = $weight;
        }

        return $this->weight;
    }
}