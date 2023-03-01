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

    #[ORM\Column]
    private ?float $Score = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Subject $SubjectName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Student $StudentName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?float
    {
        return $this->Score;
    }

    public function setScore(float $Score): self
    {
        $this->Score = $Score;

        return $this;
    }

    public function getSubjectName(): ?Subject
    {
        return $this->SubjectName;
    }

    public function setSubjectName(?Subject $SubjectName): self
    {
        $this->SubjectName = $SubjectName;

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
