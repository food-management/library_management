<?php

namespace App\Entity;

use App\Repository\BookTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookTypeRepository::class)]
class BookType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $bookCategory = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookCategory(): ?string
    {
        return $this->bookCategory;
    }

    public function setBookCategory(string $bookCategory): self
    {
        $this->bookCategory = $bookCategory;

        return $this;
    }
}
