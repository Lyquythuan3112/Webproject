<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\ManyToOne]
    private ?Classes $NameClass = null;

    #[ORM\ManyToOne]
    private ?Subject $NameSubject = null;


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

    public function getNameClass(): ?Classes
    {
        return $this->NameClass;
    }

    public function setNameClass(?Classes $NameClass): self
    {
        $this->NameClass = $NameClass;

        return $this;
    }

    public function getNameSubject(): ?Subject
    {
        return $this->NameSubject;
    }

    public function setNameSubject(?Subject $NameSubject): self
    {
        $this->NameSubject = $NameSubject;

        return $this;
    }
c
    public function __toString()
    {
        return $this ->Name;
                
    }
    
}
