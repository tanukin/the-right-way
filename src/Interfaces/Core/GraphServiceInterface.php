<?php

namespace Algorithm\Interfaces\Core;

use Algorithm\Exceptions\GraphException;

interface GraphServiceInterface
{
    /**
     * @param GraphInterface    $graph
     * @param VerticesInterface $vertices
     * @param EdgeInterface     $edge
     *
     * @return VerticesInterface
     *
     * @throws GraphException
     */
    public function getShortcut(
        GraphInterface $graph,
        VerticesInterface $vertices,
        EdgeInterface $edge
    ): array;
}