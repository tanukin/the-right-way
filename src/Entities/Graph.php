<?php

namespace Algorithm\Entities;

use Algorithm\Interfaces\Core\GraphInterface;

class Graph implements GraphInterface
{
    /**
     * @var array
     */
    private $_graph;

    /**
     * Graph constructor.
     *
     * @param array $graph
     */
    public function __construct(array $graph)
    {
        $this->_graph = $graph;
    }

    /**
     * {@inheritdoc}
     */
    public function getGraph(): array
    {
        return $this->_graph;
    }

    /**
     * {@inheritdoc}
     */
    public function getEdge(int $index): array
    {
        return array_column($this->_graph, $index);
    }

    /**
     * {@inheritdoc}
     */
    public function countEdge(): int
    {
        return count($this->_graph[0]);
    }
}