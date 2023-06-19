<?php

namespace App\Utils\Sort\Exception;

use App\Exception\ExceptionCodes;

class NotFoundCategoryForProductType extends \Exception
{
    protected $message = 'Для данного типа продукта отсутствует категория/псевдокатегория';

    protected $code = ExceptionCodes::NOT_FOUND_CATEGORY_FOR_PRODUCT_TYPE;
}