<?php

namespace Algorithm\Interfaces;

interface GraphInterface
{
    public function getGraph(): array;

    public function getEdge(int $i): array;

    public function countVertex(): int;

    public function countEdge(): int;

    public function echoGraph(): string;

}