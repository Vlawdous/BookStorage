<?php

namespace App\Model\ValuesAccessor\DTO\Book\Item;

use App\Model\ValuesAccessor\DTO\Base\Item\BaseProduct;

class BaseBook extends BaseProduct
{
    protected string $bookId;

    protected string $publisher;

    protected string $circulation;

    public function toArray(): array
    {
        $result = [
           'bookId' => $this->bookId,
           'publisher' => $this->publisher,
           'circulation' => $this->circulation,
            ...parent::toArray()
       ];

        return $result;
    }

    public function setBookId(string $bookId): self
    {
        $this->bookId = $bookId;

        return $this;
    }

    public function setPublisher(string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function setCirculation(string $circulation): self
    {
        $this->circulation = $circulation;

        return $this;
    }
}