<?php

namespace Algorithm\Interfaces;

use Algorithm\Exceptions\JsonGraphException;

interface GraphJsonInterface
{
    /**
     * @param string $graphJson
     *
     * @return array
     *
     * @throws JsonGraphException
     */
    public function decode(string $graphJson = null): array;
}