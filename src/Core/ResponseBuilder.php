<?php

namespace Algorithm\Core;

use Algorithm\Interfaces\Core\ResponseBuilderInterface;
use Algorithm\Interfaces\Core\ResponseInterface;

class ResponseBuilder implements ResponseBuilderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getResponse(array $data): ResponseInterface
    {
        return new JsonResponse($data);
    }
}