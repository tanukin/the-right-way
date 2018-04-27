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
    private $_vertices = [];

    /**
     * @var int
     */
    private $_pathSum = 0;

    /**
     * @var int
     */
    private $_usedVertex = 0;

    /**
     * @var int
     */
    private $_minWeight = 0;

    /**
     * @var int
     */
    private $_minToVertex = 0;


    /**
     * Vertices constructor.
     *
     * @param int $countVertex
     */
    public function __construct(int $countVertex)
    {
        for ($i = 0; $i < $countVertex; $i++) {
            $this->_vertices[$i] = new Vertex($i, -1);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setWeightVertices(int $from, int $weight): VerticesInterface
    {
        $vertex = $this->getVertex($from);
        $weight = $vertex->setWeight($weight + $this->_pathSum);

        if ($this->_minWeight <= 0 || $this->_minWeight >= $weight) {
            $this->_minWeight = $weight;
            $this->_minToVertex = $from;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getNextVertex(): int
    {
        $vertex = $this->getVertex($this->_usedVertex);
        $vertex->setTo($this->_minToVertex);

        $this->_pathSum = $this->_minWeight;
        $this->_usedVertex = $this->_minToVertex;

        $this->_minWeight = 0;
        $this->_minToVertex = 0;

        return $this->_usedVertex;
    }

    /**
     * {@inheritdoc}
     */
    public function isNotSetWeight(): bool
    {
        for ($i = 0; $i < count($this->_vertices); $i++) {
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
        $weight = $graph->getGraph()[$this->_usedVertex][$i];
        if (!is_int($weight)) {
            throw new VertexGraphException("Edge weight must be int.");
        }

        if ($graph->getGraph()[$this->_usedVertex][$i] <= 0) {
            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getVertices(): array
    {
        return $this->_vertices;
    }

    /**
     * @param int $i
     *
     * @return Vertex
     */
    private function getVertex(int $i): Vertex
    {
        return $this->_vertices[$i];
    }
}