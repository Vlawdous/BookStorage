<?php

namespace App\Model\ValuesAccessor\DTO\Product\Item;

class Product extends BaseProduct
{
    protected string $productId;

    public function toArray(): array
    {
        return [
            'productId' => $this->productId,
            ...parent::toArray()
        ];
    }

    public function setProductId(string $productId): self
    {
        $this->productId = $productId;

        return $this;
    }
}