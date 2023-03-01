<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column]
    private ?bool $is_seat_available = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Admin $parent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function isIsSeatAvailable(): ?bool
    {
        return $this->is_seat_available;
    }

    public function setIsSeatAvailable(bool $is_seat_available): self
    {
        $this->is_seat_available = $is_seat_available;

        return $this;
    }

    public function getParent(): ?Admin
    {
        return $this->parent;
    }

    public function setParent(?Admin $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}
