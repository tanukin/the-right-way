<?php

namespace Algorithm\Interfaces;

use Algorithm\Exceptions\EdgeGraphException;

interface EdgeInterface
{
    /**
     * @param VerticesInterface $vertices
     * @param array $edge
     *
     * @throws EdgeGraphException
     */
    public function setDataEdge(VerticesInterface $vertices, array $edge);
}