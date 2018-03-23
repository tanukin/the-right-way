<?php

namespace Algorithm\Interfaces;

use Algorithm\Exceptions\VertexGraphException;

interface VerticesInterface
{
    public function setWeightVertices(int $from, int $weight): VerticesInterface;

    public function getNextVertex(): int;

    public function isNotSetWeight(): bool;

    /**
     * @param GraphInterface $graph
     * @param $i
     *
     * @return bool
     *
     * @throws VertexGraphException
     */
    public function isZeroWeight(GraphInterface $graph, $i): bool;

    public function echoVertices(): string;
}