<?php

namespace App\Entity\Stationery;

use App\Repository\Stationery\StationeryCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StationeryCategoryRepository::class)]
class StationeryCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $alias = null;

    #[ORM\OneToMany(mappedBy: 'stationeryCategory', targetEntity: StationeryProduct::class, orphanRemoval: true)]
    private Collection $stationeryProducts;

    public function __construct()
    {
        $this->stationeryProducts = new ArrayCollection();
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
     * @return Collection<int, StationeryProduct>
     */
    public function getStationeryProducts(): Collection
    {
        return $this->stationeryProducts;
    }

    public function addStationeryProduct(StationeryProduct $stationeryProduct): self
    {
        if (!$this->stationeryProducts->contains($stationeryProduct)) {
            $this->stationeryProducts->add($stationeryProduct);
            $stationeryProduct->setStationeryCategory($this);
        }

        return $this;
    }

    public function removeStationeryProduct(StationeryProduct $stationeryProduct): self
    {
        if ($this->stationeryProducts->removeElement($stationeryProduct)) {
            // set the owning side to null (unless already changed)
            if ($stationeryProduct->getStationeryCategory() === $this) {
                $stationeryProduct->setStationeryCategory(null);
            }
        }

        return $this;
    }
}
