<?php

namespace App\Model\ValuesAccessor\DTO\Base\Item;

class BaseProduct
{
    protected string $name;

    protected string $price;

    protected ?float $rating = null;

    protected string $imageSrc;

    public function toArray(): array
    {
        $result = [
            'name' => $this->name,
            'price' => $this->price,
            'imageSrc' => $this->imageSrc
        ];

        if (isset($this->rating)) {
            $result['rating'] = $this->rating;
        }

        return $result;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function setImageSrc(string $imageSrc): self
    {
        $this->imageSrc = $imageSrc;

        return $this;
    }

    public function setRating(float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

}