<?php

namespace App\Model\ValuesAccessor\DTO\Book\Collection;

use App\Model\ValuesAccessor\DTO\Book\Item\BaseBook;

class BookCollection
{
    /**
     * @var BaseBook[]
     */
    private array $collection = [];

    /**
     * @param BaseBook[] $collection
     */
    public function __construct(array $collection = [])
    {
        $this->collection = $collection;
    }

    public function addBook(BaseBook $book): self
    {
        $this->collection[] = $book;

        return $this;
    }

    public function toArray(): array
    {
        $result = ['books' => []];

        foreach ($this->collection as $book) {
            $result['books'][] = $book->toArray();
        }

        return $result;
    }
}