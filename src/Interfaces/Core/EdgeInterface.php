<?php

namespace Algorithm\Interfaces\Core;

use Algorithm\Exceptions\GraphException;

interface EdgeInterface
{
    /**
     * @param VerticesInterface $vertices
     * @param array             $edge
     *
     * @throws GraphException
     */
    public function setDataEdge(VerticesInterface $vertices, array $edge);
}