<?php

namespace Algorithm\Interfaces\Core;

use Algorithm\Exceptions\GraphException;

interface ParseGraphInterface
{
    /**
     * @param string $graphJson
     *
     * @return array
     *
     * @throws GraphException
     */
    public function decode(string $graphJson): array;
}