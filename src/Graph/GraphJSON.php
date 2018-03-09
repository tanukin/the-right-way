<?php

namespace Algorithm\Graph;

use Algorithm\Exceptions\JSONGraphException;
use Algorithm\Interfaces\GraphJSONInterface;

class GraphJSON implements GraphJSONInterface
{
    /**
     * @var string
     */
    private $graphJSON;

    /**
     * GraphJSON constructor.
     *
     * @param string $graphJSON
     */
    public function __construct(string $graphJSON)
    {
        $this->graphJSON = $graphJSON;
    }

    /**
     * @param string $graphJSON
     *
     * @return array
     *
     * @throws JSONGraphException
     */
    public function decode(string $graphJSON = null): array
    {
        if (is_null($graphJSON))
            $graphJSON = $this->graphJSON;

        $graph = json_decode($graphJSON);

        if (json_last_error() === JSON_ERROR_NONE)
            return $graph;

        throw new JSONGraphException($this->getJSONError());
    }

    /**
     * @return string
     */
    private function getJSONError(): string
    {
        switch (json_last_error()) {
            case JSON_ERROR_DEPTH:
                $exception = 'Достигнута максимальная глубина стека';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $exception = 'Некорректные разряды или несоответствие режимов';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $exception = 'Некорректный управляющий символ';
                break;
            case JSON_ERROR_SYNTAX:
                $exception = 'Синтаксическая ошибка, некорректный JSON';
                break;
            case JSON_ERROR_UTF8:
                $exception = 'Некорректные символы UTF-8, возможно неверно закодирован';
                break;
            default:
                $exception = 'Неизвестная ошибка';
                break;
        }

        return $exception;
    }

}