<?php

namespace App\Utils\Sort\Exception;

use App\Exception\ExceptionCodes;

class UnknownCategorySorting extends \Exception
{
    protected $message = 'Неизвестный тип сортировки по категории/псевдокатегории';

    protected $code = ExceptionCodes::UNKNOWN_CATEGORY_SORT;
}