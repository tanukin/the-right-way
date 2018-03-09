<?php

namespace Algorithm\Interfaces;

interface VertexInterface
{
    public function getFrom(): int;

    public function setTo(int $to): VertexInterface;

    public function getWeight(): int;

    public function setWeight(int $weight): int;

}