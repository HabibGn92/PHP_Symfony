<?php

namespace App\Entity;

use App\Repository\CooptedEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=CooptedEntityRepository::class)
 */
class CooptedEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"cooptations"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Cooptation::class, mappedBy="coopted_entity")
     */
    private $cooptations;

    /**
     * @ORM\OneToMany(targetEntity=Pole::class, mappedBy="cooptedEntity")
     */
    private $pole;

    public function __construct()
    {
        $this->cooptations = new ArrayCollection();
        $this->pole = new ArrayCollection();
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
    /**
     * @return Collection<int, Cooptation>
     */
    public function getCooptations(): Collection
    {
        return $this->cooptations;
    }

    public function addCooptation(Cooptation $cooptation): self
    {
        if (!$this->cooptations->contains($cooptation)) {
            $this->cooptations[] = $cooptation;
            $cooptation->setCooptedEntity($this);
        }

        return $this;
    }

    public function removeCooptation(Cooptation $cooptation): self
    {
        if ($this->cooptations->removeElement($cooptation)) {
            // set the owning side to null (unless already changed)
            if ($cooptation->getCooptedEntity() === $this) {
                $cooptation->setCooptedEntity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Pole>
     */
    public function getPole(): Collection
    {
        return $this->pole;
    }

    public function addPole(Pole $pole): self
    {
        if (!$this->pole->contains($pole)) {
            $this->pole[] = $pole;
            $pole->setCooptedEntity($this);
        }

        return $this;
    }

    public function removePole(Pole $pole): self
    {
        if ($this->pole->removeElement($pole)) {
            // set the owning side to null (unless already changed)
            if ($pole->getCooptedEntity() === $this) {
                $pole->setCooptedEntity(null);
            }
        }

        return $this;
    }
}
