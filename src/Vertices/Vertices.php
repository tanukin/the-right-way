<?php

namespace Algorithm\Vertices;

use Algorithm\Exceptions\VertexGraphException;
use Algorithm\Interfaces\GraphInterface;
use Algorithm\Interfaces\VerticesInterface;

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
     * @param int $from
     * @param int $weight
     *
     * @return VerticesInterface
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
     * @return int
     */
    public function getNextVertex(): int
    {
        $this->setToVertices($this->usedVertex, $this->minToVertex);

        $this->pathSum = $this->minWeight;
        $this->usedVertex = $this->minToVertex;

        $this->minWeight = 0;
        $this->minToVertex = 0;

        return $this->usedVertex;
    }

    /**
     * @return bool
     */
    public function isNotSetWeight(): bool
    {
        for ($i = 0; $i < count($this->vertices); $i++) {
            if ($this->getVertex($i)->getWeight() == -1)
                return true;
        }

        return false;
    }

    /**
     * @param GraphInterface $graph
     * @param $i
     *
     * @return bool
     *
     * @throws VertexGraphException
     */
    public function isZeroWeight(GraphInterface $graph, $i): bool
    {
        $weight = $graph->getGraph()[$this->usedVertex][$i];
        if (!is_int($weight))
            throw new VertexGraphException("Edge weight must be int.");

        if ($graph->getGraph()[$this->usedVertex][$i] <= 0)
            return true;

        return false;
    }

    /**
     * @return string
     */
    public function echoVertices(): string
    {
        $string = "";
        for ($i = 0; $i < count($this->vertices); $i++)
            $string .= sprintf(
                "\"%d\" => %d\n",
                $this->getVertex($i)->getFrom() + 1,
                $this->getVertex($i)->getWeight()
            );

        return $string;
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

    /**
     * @param int $from
     * @param int $to
     *
     * @return Vertices
     */
    private function setToVertices(int $from, int $to): Vertices
    {
        $vertex = $this->getVertex($from);
        $vertex->setTo($to);

        return $this;
    }
}