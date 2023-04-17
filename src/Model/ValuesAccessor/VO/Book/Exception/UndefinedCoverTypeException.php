<?php

namespace App\Model\ValuesAccessor\VO\Book\Exception;

use App\Model\Book\Exception\Throwable;

class UndefinedCoverTypeException extends \Exception
{
    public function __construct(string $type, int $code = 1001, ?Throwable $previous = null)
    {
        $message = 'Неизвестный тип переплёта $type';
        parent::__construct($message, $code, $previous);
    }
}