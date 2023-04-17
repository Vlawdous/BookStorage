<?php

namespace App\Entity\Base;

use App\Repository\Base\RatingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RatingRepository::class)]
class Rating
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'ratings')]
    private ?Product $product = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 2, scale: 1)]
    private ?int $ratingValue = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $plusText = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $minusText = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $totalText = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getRatingValue(): ?int
    {
        return $this->ratingValue;
    }

    public function setRatingValue(int $ratingValue): self
    {
        $this->ratingValue = $ratingValue;

        return $this;
    }

    public function getPlusText(): ?string
    {
        return $this->plusText;
    }

    public function setPlusText(?string $plusText): self
    {
        $this->plusText = $plusText;

        return $this;
    }

    public function getMinusText(): ?string
    {
        return $this->minusText;
    }

    public function setMinusText(?string $minusText): self
    {
        $this->minusText = $minusText;

        return $this;
    }

    public function getTotalText(): ?string
    {
        return $this->totalText;
    }

    public function setTotalText(string $totalText): self
    {
        $this->totalText = $totalText;

        return $this;
    }
}
