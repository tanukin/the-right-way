<?php

namespace Algorithm\Interfaces\Controllers;

use Algorithm\Exceptions\GraphException;
use Algorithm\Interfaces\Core\ResponseInterface;
use Algorithm\Interfaces\Core\EdgeInterface;
use Algorithm\Interfaces\Core\GraphInterface;
use Algorithm\Interfaces\Core\VerticesInterface;

interface ControllerInterface
{
    /**
     * @param GraphInterface    $graph
     * @param VerticesInterface $vertices
     * @param EdgeInterface     $edge
     *
     * @return mixed
     *
     * @throws GraphException
     */
    public function execute(GraphInterface $graph, VerticesInterface $vertices, EdgeInterface $edge): ResponseInterface;
}