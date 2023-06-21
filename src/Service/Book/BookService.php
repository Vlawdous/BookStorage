<?php

namespace App\Service\Book;

use App\Model\ValuesAccessor\DTO\Book\Collection\BookCollection;
use App\Model\ValuesAccessor\DTO\Book\Item\BaseBook;
use App\Model\ValuesAccessor\DTO\Product\Collection\ProductPagination;
use App\Repository\Book\BookProductRepository;
use App\Utils\ProductSort\SortOptions;
use App\Utils\ProductSort\Sorter\BookSorter;

class BookService
{
    private BookProductRepository $bookRepository;

    public function __construct(BookProductRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getBooksByPagination(int $pageOffset, SortOptions $sortOptions): array
    {
        $books = [];

        $sorter = new BookSorter($sortOptions);

        $paginator = $this->bookRepository->getBooksPaginator()->setSorter($sorter)->paginate($pageOffset);

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