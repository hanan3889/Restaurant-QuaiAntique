<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $number_guests = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $hours = null;

    #[ORM\Column]
    private ?bool $is_lunch = null;

    #[ORM\Column]
    private ?bool $is_dinner = null;

    #[ORM\Column]
    private ?bool $is_allergy = null;

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

    public function getNumberGuests(): ?int
    {
        return $this->number_guests;
    }

    public function setNumberGuests(int $number_guests): self
    {
        $this->number_guests = $number_guests;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHours(): ?\DateTimeInterface
    {
        return $this->hours;
    }

    public function setHours(\DateTimeInterface $hours): self
    {
        $this->hours = $hours;

        return $this;
    }

    public function isIsLunch(): ?bool
    {
        return $this->is_lunch;
    }

    public function setIsLunch(bool $is_lunch): self
    {
        $this->is_lunch = $is_lunch;

        return $this;
    }

    public function isIsDinner(): ?bool
    {
        return $this->is_dinner;
    }

    public function setIsDinner(bool $is_dinner): self
    {
        $this->is_dinner = $is_dinner;

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
}
