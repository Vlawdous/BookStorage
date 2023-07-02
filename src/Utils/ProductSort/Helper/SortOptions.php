<?php

namespace App\Utils\ProductSort\Helper;

class SortOptions
{
    private ?string $index = null;

    private ?string $mode = null;

    private ?int $categoryId = null;

    private ?string $pseudoCategory = null;

    private string $productType;

    public function __construct(string $productType, array $sortOptions)
    {
        $this->productType = $productType;
        $this->index = $sortOptions['index'] ?? null;
        $this->mode = $sortOptions['mode'] ?? null;
        $this->categoryId = $sortOptions['category'] ?? null;
        $this->pseudoCategory = $sortOptions['pseudoCategory'] ?? null;
    }

    public function hasIndexSorting(): bool
    {
        return $this->index != null && $this->mode != null;
    }

    public function hasCategorySorting(): bool
    {
        return $this->categoryId != null;
    }

    public function hasPseudoCategorySorting(): bool
    {
        return $this->pseudoCategory != null;
    }

    public function getIndex(): ?string
    {
        return $this->index;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function getCategoryId(): mixed
    {
        return $this->categoryId;
    }

    public function getPseudoCategory(): mixed
    {
        return $this->pseudoCategory;
    }

    public function getProductType(): string
    {
        return $this->productType;
    }
}