<?php

namespace App\Entity;

use App\Repository\AllergyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AllergyRepository::class)]
class Allergy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $is_allergy = null;

    #[ORM\ManyToOne]
    private ?Reservation $parent = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getParent(): ?Reservation
    {
        return $this->parent;
    }

    public function setParent(?Reservation $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}
