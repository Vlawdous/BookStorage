<?php

namespace App\Model\ValuesAccessor\DTO\Book\Collection;

use App\Model\ValuesAccessor\DTO\Product\Collection\ProductCollection;

class BookCollection extends ProductCollection
{
    public function toArray(): array
    {
        $result = ['books' => []];

        foreach ($this->collection as $book) {
            $result['books'][] = $book->toArray();
        }

        return $result;
    }
}