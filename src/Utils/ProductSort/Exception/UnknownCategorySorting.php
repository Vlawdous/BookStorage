<?php

namespace App\Utils\ProductSort\Exception;

use App\Exception\ExceptionCodes;

class UnknownCategorySorting extends \Exception
{
    protected $message = 'Для данного типа продукта не предусмотрен обработчик категории';

    protected $code = ExceptionCodes::UNKNOWN_CATEGORY_SORT;
}