<?php

namespace App\Entity;

use App\Repository\PointManagementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PointManagementRepository::class)
 */
class PointManagement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $scores;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScores(): ?string
    {
        return $this->scores;
    }

    public function setScores(string $scores): self
    {
        $this->scores = $scores;

        return $this;
    }
}
