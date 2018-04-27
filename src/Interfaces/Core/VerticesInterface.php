<?php

namespace Algorithm\Interfaces\Core;

use Algorithm\Exceptions\GraphException;

interface VerticesInterface
{
    /**
     * @param int $from
     * @param int $weight
     *
     * @return VerticesInterface
     */
    public function setWeightVertices(int $from, int $weight): VerticesInterface;

    /**
     * @return int
     */
    public function getNextVertex(): int;

    /**
     * @return bool
     */
    public function isNotSetWeight(): bool;

    /**
     * @param GraphInterface $graph
     * @param $i
     *
     * @return bool
     *
     * @throws GraphException
     */
    public function isZeroWeight(GraphInterface $graph, $i): bool;

    /**
     * @return array
     */
    public function getVertices(): array;
}