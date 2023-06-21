<?php

namespace App\Utils\ProductSort\Exception;

use App\Exception\ExceptionCodes;

class UnknownProductTypeForIndexSorting extends \Exception
{
    protected $message = 'Для данного типа продукта отсутствуют сортировки по индексу';

    protected $code = ExceptionCodes::NOT_FOUND_INDEX_SORT_FOR_PRODUCT_TYPE;
}