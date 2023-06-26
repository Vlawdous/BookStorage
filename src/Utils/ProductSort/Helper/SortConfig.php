<?php

namespace App\Utils\ProductSort\Helper;

use App\Utils\ProductSort\BaseQueryGetter\HouseholdBaseQuery;
use App\Utils\ProductSort\Sorting\Index\NewSort;
use App\Utils\ProductSort\Sorting\Index\PriceSort;
use App\Utils\ProductSort\Sorting\Index\RatingSort;

class SortConfig
{
    public const BASE_QUERY_CLASSES = [
        'book' => HouseholdBaseQuery::class,
        'household' => null,
        'stationery' => null
    ];

    public const INDEX_SORTING_CLASSES = [
        NewSort::class,
        RatingSort::class,
        PriceSort::class
    ];

    public const CATEGORY_SORTING_CLASSES = [
        'book' => null,
        'household' => null,
        'stationery' => null
    ];

    public const PSEUDO_CATEGORY_SORTING_CLASSES = [
        'book' => [

        ],
        'household' => [

        ],
        'stationery' => [

        ]
    ];
}