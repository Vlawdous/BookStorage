<?php

namespace App\Model\Rpc;

use App\Exception\UndefinedProductType;
use App\Service\Book\BookService;
use App\Service\Household\HouseholdService;
use App\Service\Stationery\StationeryService;
use App\Utils\Sort\Helper\SortOptions;

class ProductFetcher
{
    private BookService $bookService;
    private HouseholdService $householdService;
    private StationeryService $stationeryService;

    public function __construct(BookService $bookService, HouseholdService $householdService, StationeryService $stationeryService)
    {
        $this->bookService = $bookService;
        $this->householdService = $householdService;
        $this->stationeryService = $stationeryService;
    }

    public function getProducts(string $productType, int $pageOffset, array $sortOptions = []): array
    {
        try {
            $sortOptions = new SortOptions($productType, $sortOptions);

            switch ($productType) {
                case 'Book':
                    return $this->bookService->getBooksByPagination($pageOffset, $sortOptions);
//                case 'Household':
//                    return $this->householdService->getHouseholds();
//                case 'Stationery':
//                    return $this->stationeryService->getStationeries();
            }
        } catch (\Exception) {
            throw new \Exception('Непредвиденная системная ошибка в процессе получения данных.', 500);
        }

        throw new UndefinedProductType("Неизвестный тип продукта: ${$productType}");
    }
}