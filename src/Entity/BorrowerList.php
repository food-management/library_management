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

    #[ORM\Column(length: 255)]
    private ?string $Status = null;

    #[ORM\ManyToOne(inversedBy: 'borrowerLists')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Book $book = null;

    #[ORM\ManyToOne(inversedBy: 'borrowerLists')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userbr = null;


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

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getUserbr(): ?User
    {
        return $this->userbr;
    }

    public function setUserbr(?User $userbr): self
    {
        $this->userbr = $userbr;

        return $this;
    }
 
   
}
