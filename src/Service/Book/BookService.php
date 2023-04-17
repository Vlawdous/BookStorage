<?php

namespace App\Service\Book;

use App\Model\ValuesAccessor\DTO\Book\Collection\BookCollection;
use App\Model\ValuesAccessor\DTO\Book\Item\BaseBook;
use App\Repository\Book\BookProductRepository;

class BookService
{
    private BookProductRepository $bookRepository;

    public function __construct(BookProductRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getNewHighRatingBooks(int $daysInterval): array
    {
        $books = [];

        foreach ($this->bookRepository->generatorNewHighRatingBooks($daysInterval) as $book) {
            $books[] = (new BaseBook())
                ->setBookId($book['id'])
                ->setName($book['name'])
                ->setPrice($book['price'])
                ->setImageSrc($book['imageSrc'])
                ->setPublisher($book['publisher'])
                ->setCirculation($book['circulation'])
                ->setRating($book['avgRating']);
        };

        return (new BookCollection($books))->toArray();
    }
}