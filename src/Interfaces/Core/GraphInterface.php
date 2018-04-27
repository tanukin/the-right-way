<?php

namespace Algorithm\Interfaces\Core;

interface GraphInterface
{
    /**
     * @return array
     */
    public function getGraph(): array;

    /**
     * @param int $index
     *
     * @return array
     */
    public function getEdge(int $index): array;

    /**
     * @return int
     */
    public function countEdge(): int;
}