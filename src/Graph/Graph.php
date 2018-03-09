<?php

namespace Algorithm\Graph;

use Algorithm\Interfaces\GraphInterface;

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
     * @return int
     */
    public function countVertex(): int
    {
        return count($this->graph);
    }

    /**
     * @return array
     */
    public function getGraph(): array
    {
        return $this->graph;
    }

    /**
     * @param int $i
     *
     * @return array
     */
    public function getEdge(int $i): array
    {
        return array_column($this->graph, $i);
    }

    /**
     * @return int
     */
    public function countEdge(): int
    {
        return count($this->graph[0]);
    }

    /**
     * @return string
     */
    public function echoGraph(): string
    {
        $string = "[\n";
        foreach ($this->graph as $value)
            $string .= "\t[".implode(",", $value) . "],\n";

        $string .= "]\n";

        return $string;
    }
}