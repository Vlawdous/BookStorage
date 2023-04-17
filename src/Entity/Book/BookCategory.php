<?php

namespace App\Entity\Book;

use App\Repository\Book\BookCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookCategoryRepository::class)]
class BookCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $alias = null;

    #[ORM\ManyToMany(targetEntity: BookProduct::class, mappedBy: 'bookCategories')]
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

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

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
            $bookProduct->addBookCategory($this);
        }

        return $this;
    }

    public function removeBookProduct(BookProduct $bookProduct): self
    {
        if ($this->bookProducts->removeElement($bookProduct)) {
            $bookProduct->removeBookCategory($this);
        }

        return $this;
    }
}
