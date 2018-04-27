<?php

namespace Algorithm\Entities;

class Vertex
{
    /**
     * @var int
     */
    private $_from;

    /**
     * @var int
     */
    private $_to;

    /**
     * @var int
     */
    private $_weight;

    /**
     * Vertex constructor.
     *
     * @param int $from
     * @param int $weight
     */
    public function __construct(int $from, int $weight)
    {
        $this->_from = $from;
        $this->_weight = $weight;
    }

    /**
     * @return int
     */
    public function getFrom(): int
    {
        return $this->_from;
    }

    /**
     * @param int $to
     *
     * @return Vertex
     */
    public function setTo(int $to): Vertex
    {
        $this->_to = $to;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeight(): int
    {
        return $this->_weight;
    }

    /**
     * @param int $weight
     *
     * @return int
     */
    public function setWeight(int $weight): int
    {
        if ($this->_weight > $weight || $this->_weight == -1) {
            $this->_weight = $weight;
        }

        return $this->_weight;
    }
}