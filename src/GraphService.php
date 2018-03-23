<?php

namespace Algorithm;

use Algorithm\Exceptions\GraphException;
use Algorithm\Interfaces\EdgeInterface;
use Algorithm\Interfaces\GraphInterface;
use Algorithm\Interfaces\GraphServiceInterface;
use Algorithm\Interfaces\VerticesInterface;
use Algorithm\Exceptions\EdgeGraphException;
use Algorithm\Exceptions\VertexGraphException;

class GraphService implements GraphServiceInterface
{
    /**
     * @var GraphInterface
     */
    private $graph;

    /**
     * @var VerticesInterface
     */
    private $vertices;

    /**
     * @var EdgeInterface
     */
    private $edge;

    private $loop = true;

    /**
     * GraphService constructor.
     *
     * @param GraphInterface $graph
     * @param VerticesInterface $vertices
     * @param EdgeInterface $edge
     */
    public function __construct(GraphInterface $graph, VerticesInterface $vertices, EdgeInterface $edge)
    {
        $this->graph = $graph;
        $this->vertices = $vertices;
        $this->edge = $edge;
    }

    /**
     * @throws EdgeGraphException
     * @throws VertexGraphException
     */
    public function run(): void
    {
        $this->vertices->setWeightVertices(0, 0);

        while ($this->vertices->isNotSetWeight()) {

            for ($i = 0; $i < $this->graph->countEdge(); $i++) {

                if ($this->vertices->isZeroWeight($this->graph, $i))
                    continue;

                $this->edge->setDataEdge($this->vertices, $this->graph->getEdge($i));
                $this->loop = true;
            }
            $this->isLoop();
            $this->vertices->getNextVertex();
        }
    }

    /**
     * @throws VertexGraphException
     */
    private function isLoop(): bool
    {
        if ($this->loop) {
            $this->loop = false;
            return false;
        } else
            throw new VertexGraphException("Invalid graph. It's impossible to get to the vertex.");
    }
}