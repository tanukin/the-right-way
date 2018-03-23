<?php

namespace Algorithm\Vertices;

use Algorithm\Interfaces\VertexInterface;

class Vertex implements VertexInterface
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
    public function setTo(int $to): VertexInterface
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
        if ($this->isMinWeight($weight))
            $this->weight = $weight;

        return $this->weight;
    }

    /**
     * @param int $newWeight
     *
     * @return bool
     */
    private function isMinWeight(int $newWeight): bool
    {
        if ($this->weight > $newWeight || $this->weight == -1)
            return true;

        return false;
    }
}