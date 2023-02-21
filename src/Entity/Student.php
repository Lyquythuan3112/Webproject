<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Name;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Phone;

    /**
     * @ORM\Column(type="date")
     */
    private $DateofBirth;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(?string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getPhone(): ?float
    {
        return $this->Phone;
    }

    public function setPhone(?float $Phone): self
    {
        $this->Phone = $Phone;

        return $this;
    }

    public function getDateofBirth(): ?\DateTimeInterface
    {
        return $this->DateofBirth;
    }

    public function setDateofBirth(\DateTimeInterface $DateofBirth): self
    {
        $this->DateofBirth = $DateofBirth;

        return $this;
    }
}
