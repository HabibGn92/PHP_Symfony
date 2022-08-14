<?php

namespace App\Entity;

use App\Repository\PoleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PoleRepository::class)
 */
class Pole
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=CooptedEntity::class, inversedBy="pole")
     */
    private $cooptedEntity;

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

    public function getCooptedEntity(): ?CooptedEntity
    {
        return $this->cooptedEntity;
    }

    public function setCooptedEntity(?CooptedEntity $cooptedEntity): self
    {
        $this->cooptedEntity = $cooptedEntity;

        return $this;
    }
}
