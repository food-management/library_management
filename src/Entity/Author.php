<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
<<<<<<< HEAD
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
=======
>>>>>>> 90e0760cb00980f78cd17fd8be7b4f351dff9850
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

<<<<<<< HEAD
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'bookauthor', targetEntity: Book::class, orphanRemoval: true)]
    private Collection $books;

    public function __construct()
    {
        $this->books = new ArrayCollection();
    }



=======
    #[ORM\Column(length: 255)]
    private ?string $image = null;

>>>>>>> 90e0760cb00980f78cd17fd8be7b4f351dff9850
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

    public function getImage(): ?string
    {
        return $this->image;
    }

<<<<<<< HEAD
    public function setImage(?string $image): self
=======
    public function setImage(string $image): self
>>>>>>> 90e0760cb00980f78cd17fd8be7b4f351dff9850
    {
        $this->image = $image;

        return $this;
    }
<<<<<<< HEAD

    /**
     * @return Collection<int, Book>
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books->add($book);
            $book->setBookauthor($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getBookauthor() === $this) {
                $book->setBookauthor(null);
            }
        }

        return $this;
    }


=======
>>>>>>> 90e0760cb00980f78cd17fd8be7b4f351dff9850
}
