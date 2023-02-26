<?php

namespace App\Entity;

use App\Repository\ScoresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoresRepository::class)]
class Scores
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Score = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Subject $NameSubject = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Student $StudentName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?string
    {
        return $this->Score;
    }

    public function setScore(string $Score): self
    {
        $this->Score = $Score;

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

    public function getStudentName(): ?Student
    {
        return $this->StudentName;
    }

    public function setStudentName(?Student $StudentName): self
    {
        $this->StudentName = $StudentName;

        return $this;
    }
}
