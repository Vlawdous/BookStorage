<?php

namespace App\Utils\ProductSort\Helper;

use App\Utils\ProductSort\BaseQueryGetter\BookBaseQuery;
use App\Utils\ProductSort\BaseQueryGetter\HouseholdBaseQuery;
use App\Utils\ProductSort\BaseQueryGetter\StationeryBaseQuery;
use App\Utils\ProductSort\Sorting\Index\CategorySorting\HouseholdCategorySort;
use App\Utils\ProductSort\Sorting\Index\NewSort;
use App\Utils\ProductSort\Sorting\Index\PriceSort;
use App\Utils\ProductSort\Sorting\Index\RatingSort;

class SortConfig
{
    public const BASE_QUERY_CLASSES = [
        'book' => BookBaseQuery::class,
        'household' => HouseholdBaseQuery::class,
        'stationery' => StationeryBaseQuery::class
    ];

    public const INDEX_SORTING_CLASSES = [
        NewSort::class,
        RatingSort::class,
        PriceSort::class
    ];

    public const CATEGORY_SORTING_CLASSES = [
        'book' => HouseholdCategorySort::class,
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