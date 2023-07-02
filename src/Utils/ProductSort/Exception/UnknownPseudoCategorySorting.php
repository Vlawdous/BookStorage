<?php

namespace App\Utils\ProductSort\Exception;

use App\Exception\ExceptionCodes;

class UnknownPseudoCategorySorting extends SortErrorException
{
    protected $message = 'Неизвестный тип сортировки по псевдокатегории';

    protected $code = ExceptionCodes::UNKNOWN_PSEUDO_CATEGORY_SORT;
}