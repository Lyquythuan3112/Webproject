<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $Sex = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Dateofbirth = null;

    #[ORM\Column]
    private ?int $phone = null;

    #[ORM\ManyToOne]
    private ?Classes $ClassName = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Subject $Subject = null;

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

    public function getSex(): ?string
    {
        return $this->Sex;
    }

    public function setSex(string $Sex): self
    {
        $this->Sex = $Sex;

        return $this;
    }

    public function getDateofbirth(): ?\DateTimeInterface
    {
        return $this->Dateofbirth;
    }

    public function setDateofbirth(\DateTimeInterface $Dateofbirth): self
    {
        $this->Dateofbirth = $Dateofbirth;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getClassName(): ?Classes
    {
        return $this->ClassName;
    }

    public function setClassName(?Classes $ClassName): self
    {
        $this->ClassName = $ClassName;

        return $this;
    }

    public function getSubject(): ?Subject
    {
        return $this->Subject;
    }

    public function setSubject(?Subject $Subject): self
    {
        $this->Subject = $Subject;

        return $this;
    }

}
