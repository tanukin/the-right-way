<?php

namespace Algorithm\Interfaces;

use Algorithm\Exceptions\JSONGraphException;

interface GraphJSONInterface
{
    /**
     * @param string $graphJSON
     *
     * @return array
     *
     * @throws JSONGraphException
     */
    public function decode(string $graphJSON = null): array;
}