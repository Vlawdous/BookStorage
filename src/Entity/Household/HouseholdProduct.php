<?php

namespace App\Entity\Household;

use App\Entity\Base\Product;
use App\Repository\Household\HouseholdProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HouseholdProductRepository::class)]
class HouseholdProduct
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $product = null;

    #[ORM\ManyToOne(inversedBy: 'householdProducts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?HouseholdCategory $householdCategory = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $horizintalLenght = null;

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

    public function getHouseholdCategory(): ?HouseholdCategory
    {
        return $this->householdCategory;
    }

    public function setHouseholdCategory(?HouseholdCategory $householdCategory): self
    {
        $this->householdCategory = $householdCategory;

        return $this;
    }

    public function getHorizintalLenght(): ?string
    {
        return $this->horizintalLenght;
    }

    public function setHorizintalLenght(string $horizintalLenght): self
    {
        $this->horizintalLenght = $horizintalLenght;

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
