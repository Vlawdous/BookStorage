<?php

namespace App\Entity\Book;

use App\Repository\Book\CoverTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoverTypeRepository::class)]
class CoverType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'coverType', targetEntity: BookProduct::class)]
    private Collection $bookProducts;

    public function __construct()
    {
        $this->bookProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, BookProduct>
     */
    public function getBookProducts(): Collection
    {
        return $this->bookProducts;
    }

    public function addBookProduct(BookProduct $bookProduct): self
    {
        if (!$this->bookProducts->contains($bookProduct)) {
            $this->bookProducts->add($bookProduct);
            $bookProduct->setCoverType($this);
        }

        return $this;
    }

    public function removeBookProduct(BookProduct $bookProduct): self
    {
        if ($this->bookProducts->removeElement($bookProduct)) {
            // set the owning side to null (unless already changed)
            if ($bookProduct->getCoverType() === $this) {
                $bookProduct->setCoverType(null);
            }
        }

        return $this;
    }
}
