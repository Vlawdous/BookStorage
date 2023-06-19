<?php

namespace App\Validator\SortOptions;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class SortOptions extends Constraint
{
    public string $message = 'Параметры сортировки переданы неверно. Причина: {{string}}.';
}