<?php

namespace App\Entity;

use App\Repository\BorrowerListRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BorrowerListRepository::class)]
class BorrowerList
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $borrowedDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $returnDate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrowedDate(): ?\DateTimeInterface
    {
        return $this->borrowedDate;
    }

    public function setBorrowedDate(\DateTimeInterface $borrowedDate): self
    {
        $this->borrowedDate = $borrowedDate;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->returnDate;
    }

    public function setReturnDate(\DateTimeInterface $returnDate): self
    {
        $this->returnDate = $returnDate;

        return $this;
    }
}
