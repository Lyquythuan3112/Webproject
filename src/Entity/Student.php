<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: Subject::class)]
    private Collection $Subject;

    public function __construct()
    {
        $this->Subject = new ArrayCollection();
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

    /**
     * @return Collection<int, Subject>
     */
    public function getSubject(): Collection
    {
        return $this->Subject;
    }

    public function addSubject(Subject $subject): self
    {
        if (!$this->Subject->contains($subject)) {
            $this->Subject->add($subject);
        }

        return $this;
    }

    public function removeSubject(Subject $subject): self
    {
        $this->Subject->removeElement($subject);

        return $this;
    }
}
