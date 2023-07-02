<?php

namespace App\Utils\ProductSort\Exception;

use App\Exception\ExceptionCodes;

class NotFoundBaseQueryForProductType extends SortErrorException
{
    protected $message = 'Для данного типа продукта не найдена базовая часть запроса для сортировки';

    protected $code = ExceptionCodes::NOT_FOUND_BASE_QUERY_FOR_PRODUCT_TYPE;
}