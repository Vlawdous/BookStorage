<?php

namespace App\Model\Rpc;

use App\Service\Book\BookService;

class NewHighRatingBooksFetcher
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function getNewHighRatingBooks(int $pageOffset, int $daysInterval): array
    {
        return $this->bookService->getNewHighRatingBooks($pageOffset, $daysInterval);
    }
}