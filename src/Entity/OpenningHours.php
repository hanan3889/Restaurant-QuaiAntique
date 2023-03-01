<?php

namespace App\Entity;

use App\Repository\OpenningHoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpenningHoursRepository::class)]
class OpenningHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $days = null;

    #[ORM\Column(length: 50)]
    private ?string $hours = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Admin $parent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDays(): ?string
    {
        return $this->days;
    }

    public function setDays(string $days): self
    {
        $this->days = $days;

        return $this;
    }

    public function getHours(): ?string
    {
        return $this->hours;
    }

    public function setHours(string $hours): self
    {
        $this->hours = $hours;

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
