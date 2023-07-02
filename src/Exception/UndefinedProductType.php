<?php

namespace App\Exception;

class UndefinedProductType extends \Exception
{
    protected $code = ExceptionCodes::UNKNOWN_PRODUCT_TYPE_EXCEPTION;
}