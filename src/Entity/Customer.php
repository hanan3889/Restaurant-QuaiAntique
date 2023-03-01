<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $number_guest = null;

    #[ORM\Column]
    private ?bool $is_allergy = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $parent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberGuest(): ?int
    {
        return $this->number_guest;
    }

    public function setNumberGuest(int $number_guest): self
    {
        $this->number_guest = $number_guest;

        return $this;
    }

    public function isIsAllergy(): ?bool
    {
        return $this->is_allergy;
    }

    public function setIsAllergy(bool $is_allergy): self
    {
        $this->is_allergy = $is_allergy;

        return $this;
    }

    public function getParent(): ?User
    {
        return $this->parent;
    }

    public function setParent(?User $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}
