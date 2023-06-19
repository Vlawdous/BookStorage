<?php

namespace App\Model\ValuesAccessor\DTO\Product\Collection;

use App\Model\ValuesAccessor\DTO\Product\Item\BaseProduct;

class ProductCollection
{
    /**
     * @var BaseProduct[]
     */
    protected array $collection = [];

    /**
     * @param BaseProduct[] $collection
     */
    public function __construct(array $collection = [])
    {
        $this->collection = $collection;
    }

    public function toArray(): array
    {
        $result = ['products' => []];

        foreach ($this->collection as $book) {
            $result['products'][] = $book->toArray();
        }

        return $result;
    }
}