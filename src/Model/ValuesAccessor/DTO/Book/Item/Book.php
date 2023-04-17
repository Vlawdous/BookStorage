<?php

namespace App\Model\ValuesAccessor\DTO\Book\Item;

use App\Model\ValuesAccessor\VO\Book\CoverType;

class Book extends BaseBook
{
    private array $bookCategories;

    private ?string $datePublic;

    private string $authors;

    private int $numberOfPages;

    private float $horizontalLength;

    private float $verticalLength;

    private string $width;

    private CoverType $coverType;

    public function toArray(): array
    {
        return [
            ...parent::toArray(),
            'categories' => $this->bookCategories,
            'datePublic' => $this->datePublic,
            'authors' => $this->authors,
            'numberOfPages' => $this->numberOfPages,
            'horizontalLength' => $this->horizontalLength,
            'verticalLength' => $this->verticalLength,
            'width' => $this->width,
            'coverType' => $this->coverType->getCoverType()
        ];
    }

    public function setBookCategories(array $bookCategories): self
    {
        $this->bookCategories = $bookCategories;

        return $this;
    }

    public function setDatePublic(?string $datePublic): self
    {
        $this->datePublic = $datePublic;

        return $this;
    }

    public function setAuthors(string $authors): self
    {
        $this->authors = $authors;

        return $this;
    }

    public function setNumberOfPages(int $numberOfPages): self
    {
        $this->numberOfPages = $numberOfPages;

        return $this;
    }

    public function setVerticalLength(float $verticalLength): self
    {
        $this->verticalLength = $verticalLength;

        return $this;
    }

    public function setHorizontalLength(float $horizontalLength): self
    {
        $this->horizontalLength = $horizontalLength;

        return $this;
    }

    public function setWidth(string $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function setCoverType(CoverType $coverType): self
    {
        $this->coverType = $coverType;

        return $this;
    }
}