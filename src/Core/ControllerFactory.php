<?php

namespace Algorithm\Core;

use Algorithm\Controllers\GraphController;
use Algorithm\Interfaces\Controllers\ControllerInterface;
use Algorithm\Interfaces\Core\ResponseBuilderInterface;
use Algorithm\Interfaces\Core\GraphServiceInterface;

class ControllerFactory
{
    /**
     * Return GraphController
     *
     * @param GraphServiceInterface    $graphService
     * @param ResponseBuilderInterface $responseBuilder
     *
     * @return ControllerInterface
     */
    public function getController(
        GraphServiceInterface $graphService,
        ResponseBuilderInterface $responseBuilder
    ): ControllerInterface
    {
        return new GraphController($graphService, $responseBuilder);
    }
}