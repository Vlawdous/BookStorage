<?php

namespace App\Service\Book;

use App\Model\ValuesAccessor\DTO\Book\Collection\BookCollection;
use App\Model\ValuesAccessor\DTO\Book\Item\BaseBook;
use App\Model\ValuesAccessor\DTO\Product\Collection\ProductPagination;
use App\Repository\Book\BookProductRepository;
use App\Utils\Pagination\Factory\PaginatorFactory;
use App\Utils\ProductSort\Helper\SortOptions;
use App\Utils\ProductSort\ProductSorterFactory;

class BookService
{
    private BookProductRepository $bookRepository;

    private ProductSorterFactory $sorterFactory;

    private PaginatorFactory $paginatorFactory;

    public function __construct(BookProductRepository $bookRepository, ProductSorterFactory $sorterFactory, PaginatorFactory $paginatorFactory)
    {
        $this->bookRepository = $bookRepository;
        $this->sorterFactory = $sorterFactory;
        $this->paginatorFactory = $paginatorFactory;
    }

    public function getBooksByPagination(int $pageOffset, SortOptions $sortOptions): array
    {
        $books = [];

        $qb = $this->sorterFactory->createSorter($sortOptions)->addSort();
        $paginator = $this->paginatorFactory->create($qb)->paginate($pageOffset);

        foreach ($paginator->getItems() as $book) {
            $books[] = (new BaseBook())
                ->setBookId($book['id'])
                ->setName($book['name'])
                ->setPrice($book['price'])
                ->setImageSrc($book['imageSrc'])
                ->setPublisher($book['publisher'])
                ->setCirculation($book['circulation'])
                ->setRating($book['avgRating']);
        };

        $productPagination = (new ProductPagination())
            ->setProducts(new BookCollection($books))
            ->setCurrentPage($paginator->getCurrentPage())
            ->setNumberPages($paginator->getNumberPages());

        return (new BookCollection($books))->toArray();
    }
}