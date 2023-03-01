<?php

namespace App\Entity;

use App\Repository\CampusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CampusRepository::class)]
class Campus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\OneToMany(mappedBy: 'CampusName', targetEntity: Classes::class)]
    private Collection $Class;

    public function __construct()
    {
        $this->Class = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection<int, Classes>
     */
    public function getClass(): Collection
    {
        return $this->Class;
    }

    public function addClass(Classes $class): self
    {
        if (!$this->Class->contains($class)) {
            $this->Class->add($class);
            $class->setCampusName($this);
        }

        return $this;
    }

    public function removeClass(Classes $class): self
    {
        if ($this->Class->removeElement($class)) {
            // set the owning side to null (unless already changed)
            if ($class->getCampusName() === $this) {
                $class->setCampusName(null);
            }
        }

        return $this;
    }
}
