<?php

namespace Algorithm\Entities;

use Algorithm\Interfaces\Core\GraphInterface;

class Graph implements GraphInterface
{
    /**
     * @var array
     */
    private $graph;

    /**
     * Graph constructor.
     *
     * @param array $graph
     */
    public function __construct(array $graph)
    {
        $this->graph = $graph;
    }

    /**
     * {@inheritdoc}
     */
    public function getGraph(): array
    {
        return $this->graph;
    }

    /**
     * {@inheritdoc}
     */
    public function getEdge(int $index): array
    {
        return array_column($this->graph, $index);
    }

    /**
     * {@inheritdoc}
     */
    public function countEdge(): int
    {
        return count($this->graph[0]);
    }
}