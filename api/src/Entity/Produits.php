<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProduitsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(shortName :'Produit')]
class Produits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageUrl = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageUrl2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageUrl3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $collection = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 9, scale: 2, nullable: true)]
    private ?string $prix = null;

    #[ORM\Column]
    private ?bool $visible = true;

    #[ORM\Column]
    private ?int $stock = 1;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getImageUrl2(): ?string
    {
        return $this->imageUrl2;
    }

    public function setImageUrl2(?string $imageUrl2): static
    {
        $this->imageUrl2 = $imageUrl2;

        return $this;
    }

    public function getImageUrl3(): ?string
    {
        return $this->imageUrl3;
    }

    public function setImageUrl3(?string $imageUrl3): static
    {
        $this->imageUrl3 = $imageUrl3;

        return $this;
    }



    public function getCollection(): ?string
    {
        return $this->collection;
    }

    public function setCollection(?string $collection): static
    {
        $this->collection = $collection;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function isVisible(): ?bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): static
    {
        $this->visible = $visible;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

}
