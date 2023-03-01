<?php

namespace App\Entity;

use App\Repository\VisitorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisitorRepository::class)]
class Visitor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Reservation $parent = null;

    public function getId(): ?int
    {
        return $this->id;
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
