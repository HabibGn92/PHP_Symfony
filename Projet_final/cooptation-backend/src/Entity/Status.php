<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=StatusRepository::class)
 */
class Status
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
     * @ORM\OneToMany(targetEntity=Cooptation::class, mappedBy="status")
     */
    private $cooptations;

    public function __construct()
    {
        $this->cooptations = new ArrayCollection();
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
            $cooptation->setStatus($this);
        }

        return $this;
    }

    public function removeCooptation(Cooptation $cooptation): self
    {
        if ($this->cooptations->removeElement($cooptation)) {
            // set the owning side to null (unless already changed)
            if ($cooptation->getStatus() === $this) {
                $cooptation->setStatus(null);
            }
        }

        return $this;
    }
}
