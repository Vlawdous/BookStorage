<?php

namespace App\Utils\ProductSort;

use App\Utils\Sort\Sorting\CategorySorting\BookCategorySort;
use App\Utils\ProductSort\Sorting\IndexSorting\NewSort;
use App\Utils\ProductSort\Sorting\IndexSorting\PriceSort;
use App\Utils\ProductSort\Sorting\IndexSorting\RatingSort;

class SortConfig
{
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