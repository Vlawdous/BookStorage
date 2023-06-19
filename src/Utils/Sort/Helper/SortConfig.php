<?php

namespace App\Utils\Sort\Helper;

use App\Utils\Sort\Sorting\CategorySorting\BookCategorySort;
use App\Utils\Sort\Sorting\IndexSorting\NewSort;
use App\Utils\Sort\Sorting\IndexSorting\PriceSort;
use App\Utils\Sort\Sorting\IndexSorting\RatingSort;

class SortConfig
{
    public const INDEX_SORTING_CLASSES = [
        NewSort::class,
        RatingSort::class,
        PriceSort::class
    ];

    public const CATEGORY_SORTING_CLASSES = [
        'book' => BookCategorySort::class
    ];

    public const PSEUDOCATEGORY_SORTING_CLASSES = [
        'book' => [

        ],
        'household' => [

        ],
        'stationery' => [

        ]
    ];
}