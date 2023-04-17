<?php

namespace App\Model\RpcModel;

use App\Service\Book\BookService;

class NewHighRatingBooksFetcher
{
    private BookService $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function getNewHighRatingBooks(int $daysInterval): array
    {
        return $this->bookService->getNewHighRatingBooks($daysInterval);
    }
}