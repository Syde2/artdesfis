<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
#[ApiResource]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    /**
     * @var Collection<int, Produits>
     */
    #[ORM\OneToMany(targetEntity: Produits::class, mappedBy: 'categorie')]
    private Collection $produitsAssocies;

    public function __construct()
    {
        $this->produitsAssocies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Produits>
     */
    public function getProduitsAssocies(): Collection
    {
        return $this->produitsAssocies;
    }

    public function addProduitsAssocy(Produits $produitsAssocy): static
    {
        if (!$this->produitsAssocies->contains($produitsAssocy)) {
            $this->produitsAssocies->add($produitsAssocy);
            $produitsAssocy->setCategorie($this);
        }

        return $this;
    }

    public function removeProduitsAssocy(Produits $produitsAssocy): static
    {
        if ($this->produitsAssocies->removeElement($produitsAssocy)) {
            // set the owning side to null (unless already changed)
            if ($produitsAssocy->getCategorie() === $this) {
                $produitsAssocy->setCategorie(null);
            }
        }

        return $this;
    }
}
