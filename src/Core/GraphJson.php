<?php

namespace Algorithm\Core;

use Algorithm\Exceptions\JsonGraphException;
use Algorithm\Interfaces\Core\ParseGraphInterface;

class GraphJson implements ParseGraphInterface
{
    /**
     * {@inheritdoc}
     */
    public function decode(string $graphJson): array
    {
        $graph = json_decode($graphJson);

        if (json_last_error() === JSON_ERROR_NONE) {
            return $graph;
        }

        throw new JsonGraphException($this->getJsonError());
    }

    /**
     * Return error message
     *
     * @return string
     */
    private function getJsonError(): string
    {
        switch (json_last_error()) {
        case JSON_ERROR_DEPTH:
            $exception = 'Maximum stack depth reached';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            $exception = 'Incorrect digits or mismatch of modes';
            break;
        case JSON_ERROR_CTRL_CHAR:
            $exception = 'Incorrect control character';
            break;
        case JSON_ERROR_SYNTAX:
            $exception = 'Syntax error, incorrect JSON';
            break;
        case JSON_ERROR_UTF8:
            $exception = 'Incorrect UTF-8 characters,'.
                'possibly incorrectly coded';
            break;
        default:
            $exception = 'Unknown error';
            break;
        }

        return $exception;
    }
}