<?php

namespace App\Model\ValuesAccessor\DTO\Product\Collection;

class ProductPagination
{
    private ProductCollection $products;

    private int $currentPage;

    private int $numberPages;

    public function toArray(): array
    {
        return [
            ...$this->products->toArray(),
            'currentPage' => $this->currentPage,
            'numberPages' => $this->numberPages
        ];
    }

    /**
     * @param ProductCollection $products
     */
    public function setProducts(ProductCollection $products): self
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @param int $currentPage
     */
    public function setCurrentPage(int $currentPage): self
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    /**
     * @param int $numberPages
     */
    public function setNumberPages(int $numberPages): self
    {
        $this->numberPages = $numberPages;

        return $this;
    }
}