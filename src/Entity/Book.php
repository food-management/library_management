<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $discription = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BookType $booktype = null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Author $bookauthor = null;

    #[ORM\OneToMany(mappedBy: 'book', targetEntity: BorrowerList::class)]
    private Collection $borrowerLists;

    public function __construct()
    {
        $this->borrowerLists = new ArrayCollection();
    }

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

    public function getDiscription(): ?string
    {
        return $this->discription;
    }

    public function setDiscription(string $discription): self
    {
        $this->discription = $discription;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBooktype(): ?BookType
    {
        return $this->booktype;
    }

    public function setBooktype(?BookType $booktype): self
    {
        $this->booktype = $booktype;

        return $this;
    }

    public function getBookauthor(): ?Author
    {
        return $this->bookauthor;
    }

    public function setBookauthor(?Author $bookauthor): self
    {
        $this->bookauthor = $bookauthor;

        return $this;
    }

    /**
     * @return Collection<int, BorrowerList>
     */
    public function getBorrowerLists(): Collection
    {
        return $this->borrowerLists;
    }

    public function addBorrowerList(BorrowerList $borrowerList): self
    {
        if (!$this->borrowerLists->contains($borrowerList)) {
            $this->borrowerLists->add($borrowerList);
            $borrowerList->setBook($this);
        }

        return $this;
    }

    public function removeBorrowerList(BorrowerList $borrowerList): self
    {
        if ($this->borrowerLists->removeElement($borrowerList)) {
            // set the owning side to null (unless already changed)
            if ($borrowerList->getBook() === $this) {
                $borrowerList->setBook(null);
            }
        }

        return $this;
    }
}
