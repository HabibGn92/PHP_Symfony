<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use JMS\Serializer\Annotation as Serializer;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"users"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"users"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"users"})
     */
    private $author;

    /**
     * @ORM\Column(type="text")
     * @Serializer\Groups({"users"})
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Groups({"users"})
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
