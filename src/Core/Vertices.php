<?php

namespace Algorithm\Core;

use Algorithm\Entities\Vertex;
use Algorithm\Exceptions\VertexGraphException;
use Algorithm\Interfaces\Core\GraphInterface;
use Algorithm\Interfaces\Core\VerticesInterface;

class Vertices implements VerticesInterface
{
    /**
     * @var array
     */
    private $vertices = [];

    /**
     * @var int
     */
    private $pathSum = 0;

    /**
     * @var int
     */
    private $usedVertex = 0;

    /**
     * @var int
     */
    private $minWeight = 0;

    /**
     * @var int
     */
    private $minToVertex = 0;


    /**
     * Vertices constructor.
     *
     * @param int $countVertex
     */
    public function __construct(int $countVertex)
    {
        for ($i = 0; $i < $countVertex; $i++) {
            $this->vertices[$i] = new Vertex($i, -1);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setWeightVertices(int $from, int $weight): VerticesInterface
    {
        $vertex = $this->getVertex($from);
        $weight = $vertex->setWeight($weight + $this->pathSum);

        if ($this->minWeight <= 0 || $this->minWeight >= $weight) {
            $this->minWeight = $weight;
            $this->minToVertex = $from;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getNextVertex(): int
    {
        $vertex = $this->getVertex($this->usedVertex);
        $vertex->setTo($this->minToVertex);

        $this->pathSum = $this->minWeight;
        $this->usedVertex = $this->minToVertex;

        $this->minWeight = 0;
        $this->minToVertex = 0;

        return $this->usedVertex;
    }

    /**
     * {@inheritdoc}
     */
    public function isNotSetWeight(): bool
    {
        for ($i = 0; $i < count($this->vertices); $i++) {
            if ($this->getVertex($i)->getWeight() == -1) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function isZeroWeight(GraphInterface $graph, $i): bool
    {
        $weight = $graph->getGraph()[$this->usedVertex][$i];
        if (!is_int($weight)) {
            throw new VertexGraphException("Edge weight must be int.");
        }

        if ($graph->getGraph()[$this->usedVertex][$i] <= 0) {
            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getVertices(): array
    {
        return $this->vertices;
    }

    /**
     * @param int $i
     *
     * @return Vertex
     */
    private function getVertex(int $i): Vertex
    {
        return $this->vertices[$i];
    }
}