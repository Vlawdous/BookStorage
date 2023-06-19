<?php

namespace App\Utils\Sort\Exception;

use App\Exception\ExceptionCodes;

class UnknownIndexSorting extends \Exception
{
    protected $message = 'Неизвестный тип сортировки по индексу';

    protected $code = ExceptionCodes::UNKNOWN_INDEX_SORT;
}