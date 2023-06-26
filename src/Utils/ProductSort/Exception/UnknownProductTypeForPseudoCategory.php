<?php

namespace App\Utils\ProductSort\Exception;

use App\Exception\ExceptionCodes;

class UnknownProductTypeForPseudoCategory extends SortErrorException
{
    protected $message = 'Для данного типа продукта отсутствуют псевдокатегории';

    protected $code = ExceptionCodes::NOT_FOUND_PSEUDO_CATEGORY_FOR_PRODUCT_TYPE;
}