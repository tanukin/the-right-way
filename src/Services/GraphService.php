<?php

namespace Algorithm\Services;

use Algorithm\Exceptions\GraphException;
use Algorithm\Exceptions\VertexGraphException;
use Algorithm\Interfaces\Core\EdgeInterface;
use Algorithm\Interfaces\Core\GraphInterface;
use Algorithm\Interfaces\Core\GraphServiceInterface;
use Algorithm\Interfaces\Core\VerticesInterface;

class GraphService implements GraphServiceInterface
{
    private $_loop = true;

    /**
     * {@inheritdoc}
     */
    public function getShortcut(
        GraphInterface $graph,
        VerticesInterface $vertices,
        EdgeInterface $edge
    ): array
    {
        $vertices->setWeightVertices(0, 0);

        while ($vertices->isNotSetWeight()) {

            for ($i = 0; $i < $graph->countEdge(); $i++) {

                if ($vertices->isZeroWeight($graph, $i)) {
                    continue;
                }

                $edge->setDataEdge($vertices, $graph->getEdge($i));
                $this->_loop = true;
            }
            $this->isLoop();
            $vertices->getNextVertex();
        }

        return $this->getDataInArray($vertices);
    }

    /**
     * @throws GraphException
     */
    private function isLoop(): void
    {
        if (!$this->_loop) {
            throw new VertexGraphException(
                "Invalid graph. It's impossible to get to the vertex."
            );
        }

        $this->_loop = false;
    }

    private function getDataInArray(VerticesInterface $vertices): array
    {
        $data = $vertices->getVertices();

        $results = array_map(
            function ($item) {
                $key = $item->getFrom() + 1;
                return [$key => $item->getWeight()];
            }, $data
        );

        return $results;
    }

}