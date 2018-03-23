<?php

namespace Algorithm\Edge;

use Algorithm\Exceptions\EdgeGraphException;
use Algorithm\Interfaces\EdgeInterface;
use Algorithm\Interfaces\VerticesInterface;

class Edge implements EdgeInterface
{

    /**
     * @param VerticesInterface $vertices
     * @param array $edge
     *
     * @throws EdgeGraphException
     */
    public function setDataEdge(VerticesInterface $vertices, array $edge)
    {
        for ($i = 0; $i < count($edge); $i++) {
            if ($edge[$i] == 0)
                continue;

            if ($edge[$i] < 0)
                $to = $i;
            else
                $weight = $edge[$i];
        }

        if (empty($to))
            throw new EdgeGraphException(sprintf("Invalid edge (%s)", implode(',', $edge)));

        if (empty($weight))
            throw new EdgeGraphException("Invalid weight");

        $vertices->setWeightVertices($to, $weight);
    }
}