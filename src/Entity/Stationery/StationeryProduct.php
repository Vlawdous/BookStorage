<?php

namespace App\Entity\Stationery;

use App\Entity\Base\Product;
use App\Repository\Stationery\StationeryProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StationeryProductRepository::class)]
class StationeryProduct
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $product = null;

    #[ORM\ManyToOne(inversedBy: 'stationeryProducts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?StationeryCategory $stationeryCategory = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $horizontalLenght = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $verticalLenght = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $width = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getStationeryCategory(): ?StationeryCategory
    {
        return $this->stationeryCategory;
    }

    public function setStationeryCategory(?StationeryCategory $stationeryCategory): self
    {
        $this->stationeryCategory = $stationeryCategory;

        return $this;
    }

    public function getHorizontalLenght(): ?string
    {
        return $this->horizontalLenght;
    }

    public function setHorizontalLenght(string $horizontalLenght): self
    {
        $this->horizontalLenght = $horizontalLenght;

        return $this;
    }

    public function getVerticalLenght(): ?string
    {
        return $this->verticalLenght;
    }

    public function setVerticalLenght(string $verticalLenght): self
    {
        $this->verticalLenght = $verticalLenght;

        return $this;
    }

    public function getWidth(): ?string
    {
        return $this->width;
    }

    public function setWidth(string $width): self
    {
        $this->width = $width;

        return $this;
    }
}
