<?php

namespace App\Entity\Household;

use App\Repository\Household\HouseholdCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HouseholdCategoryRepository::class)]
class HouseholdCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $alias = null;

    #[ORM\OneToMany(mappedBy: 'householdCategory', targetEntity: HouseholdProduct::class, orphanRemoval: true)]
    private Collection $householdProducts;

    public function __construct()
    {
        $this->householdProducts = new ArrayCollection();
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
     * @return Collection<int, HouseholdProduct>
     */
    public function getHouseholdProducts(): Collection
    {
        return $this->householdProducts;
    }

    public function addHouseholdProduct(HouseholdProduct $householdProduct): self
    {
        if (!$this->householdProducts->contains($householdProduct)) {
            $this->householdProducts->add($householdProduct);
            $householdProduct->setHouseholdCategory($this);
        }

        return $this;
    }

    public function removeHouseholdProduct(HouseholdProduct $householdProduct): self
    {
        if ($this->householdProducts->removeElement($householdProduct)) {
            // set the owning side to null (unless already changed)
            if ($householdProduct->getHouseholdCategory() === $this) {
                $householdProduct->setHouseholdCategory(null);
            }
        }

        return $this;
    }
}
