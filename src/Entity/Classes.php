<?php

namespace App\Entity;

use App\Repository\ClassesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassesRepository::class)]
class Classes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name ;

    #[ORM\Column(length: 255)]
    private ?string $Type ;

    #[ORM\ManyToOne(inversedBy: 'Class')]
    private ?Campus $CampusName = null;

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

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }
    public function __toString()
    {
        return $this ->Name;
                
    }

    public function getCampusName(): ?Campus
    {
        return $this->CampusName;
    }

    public function setCampusName(?Campus $CampusName): self
    {
        $this->CampusName = $CampusName;

        return $this;
    }
}
