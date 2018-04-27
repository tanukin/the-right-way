<?php

namespace Algorithm\Controllers;

use Algorithm\Interfaces\Controllers\ControllerInterface;
use Algorithm\Interfaces\Core\ResponseBuilderInterface;
use Algorithm\Interfaces\Core\ResponseInterface;
use Algorithm\Interfaces\Core\EdgeInterface;
use Algorithm\Interfaces\Core\GraphInterface;
use Algorithm\Interfaces\Core\GraphServiceInterface;
use Algorithm\Interfaces\Core\VerticesInterface;

class GraphController implements ControllerInterface
{
    /**
     * @var GraphServiceInterface
     */
    private $graphService;
    /**
     * @var ResponseBuilderInterface
     */
    private $responseBuilder;

    /**
     * GraphController constructor.
     *
     * @param GraphServiceInterface    $graphService
     * @param ResponseBuilderInterface $responseBuilder
     */
    public function __construct(GraphServiceInterface $graphService, ResponseBuilderInterface $responseBuilder)
    {
        $this->graphService = $graphService;
        $this->responseBuilder = $responseBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(GraphInterface $graph, VerticesInterface $vertices, EdgeInterface $edge): ResponseInterface
    {
        $data = $this->graphService->getShortcut($graph, $vertices, $edge);

        return $this->responseBuilder->getResponse($data);
    }
}