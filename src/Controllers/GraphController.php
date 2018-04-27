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
    private $_graphService;
    /**
     * @var ResponseBuilderInterface
     */
    private $_responseBuilder;

    /**
     * GraphController constructor.
     *
     * @param GraphServiceInterface    $graphService
     * @param ResponseBuilderInterface $responseBuilder
     */
    public function __construct(
        GraphServiceInterface $graphService,
        ResponseBuilderInterface $responseBuilder
    )
    {
        $this->_graphService = $graphService;
        $this->_responseBuilder = $responseBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(
        GraphInterface $graph,
        VerticesInterface $vertices,
        EdgeInterface $edge
    ): ResponseInterface
    {
        $data = $this->_graphService->getShortcut($graph, $vertices, $edge);

        return $this->_responseBuilder->getResponse($data);
    }
}