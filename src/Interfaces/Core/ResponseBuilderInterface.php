<?php

namespace Algorithm\Interfaces\Core;

interface ResponseBuilderInterface
{
    /**
     * @param array $data
     *
     * @return ResponseInterface
     */
    public function getResponse(array $data): ResponseInterface;
}