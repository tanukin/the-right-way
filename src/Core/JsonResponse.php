<?php

namespace Algorithm\Core;

use Algorithm\Interfaces\Core\ResponseInterface;

class JsonResponse implements ResponseInterface
{
    /**
     * @var array
     */
    private $_data;

    /**
     * JsonResponse constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->_data = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse(): string
    {
        return json_encode($this->_data);
    }
}