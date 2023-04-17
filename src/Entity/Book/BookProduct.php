<?php

namespace App\Entity\Book;

use App\Entity\Base\Product;
use App\Repository\Book\BookProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookProductRepository::class)]
class BookProduct
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datePublicate = null;

    #[ORM\Column]
    private ?int $numberOfPages = null;

    #[ORM\Column(length: 255)]
    private ?string $publisher = null;

    #[ORM\Column]
    private ?int $circulation = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $weight = null;

    #[ORM\Column]
    private ?int $ageLimit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $horizontalLength = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $verticalLength = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $width = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $product = null;

    #[ORM\ManyToMany(targetEntity: BookCategory::class, inversedBy: 'bookProducts')]
    private Collection $bookCategories;

    #[ORM\ManyToMany(targetEntity: Author::class, inversedBy: 'bookProducts')]
    private Collection $authors;

    #[ORM\ManyToOne(inversedBy: 'bookProducts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CoverType $coverType = null;

    public function __construct()
    {
        $this->bookCategories = new ArrayCollection();
        $this->authors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePublicate(): ?\DateTimeInterface
    {
        return $this->datePublicate;
    }

    public function setDatePublicate(?\DateTimeInterface $datePublicate): self
    {
        $this->datePublicate = $datePublicate;

        return $this;
    }

    public function getNumberOfPages(): ?int
    {
        return $this->numberOfPages;
    }

    public function setNumberOfPages(int $numberOfPages): self
    {
        $this->numberOfPages = $numberOfPages;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getCirculation(): ?int
    {
        return $this->circulation;
    }

    public function setCirculation(int $circulation): self
    {
        $this->circulation = $circulation;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getAgeLimit(): ?int
    {
        return $this->ageLimit;
    }

    public function setAgeLimit(int $ageLimit): self
    {
        $this->ageLimit = $ageLimit;

        return $this;
    }

    public function getHorizontalLength(): ?string
    {
        return $this->horizontalLength;
    }

    public function setHorizontalLength(string $horizontalLength): self
    {
        $this->horizontalLength = $horizontalLength;

        return $this;
    }

    public function getVerticalLength(): ?string
    {
        return $this->verticalLength;
    }

    public function setVerticalLength(string $verticalLength): self
    {
        $this->verticalLength = $verticalLength;

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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Collection<int, BookCategory>
     */
    public function getBookCategories(): Collection
    {
        return $this->bookCategories;
    }

    public function addBookCategory(BookCategory $bookCategory): self
    {
        if (!$this->bookCategories->contains($bookCategory)) {
            $this->bookCategories->add($bookCategory);
        }

        return $this;
    }

    public function removeBookCategory(BookCategory $bookCategory): self
    {
        $this->bookCategories->removeElement($bookCategory);

        return $this;
    }

    /**
     * @return Collection<int, Author>
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function addAuthor(Author $author): self
    {
        if (!$this->authors->contains($author)) {
            $this->authors->add($author);
        }

        return $this;
    }

    public function removeAuthor(Author $author): self
    {
        $this->authors->removeElement($author);

        return $this;
    }

    public function getCoverType(): ?CoverType
    {
        return $this->coverType;
    }

    public function setCoverType(?CoverType $coverType): self
    {
        $this->coverType = $coverType;

        return $this;
    }
}
