<?php

namespace App\Entity;

use App\Repository\SatisfactionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=SatisfactionRepository::class)
 */
class Satisfaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $studentName;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\GreaterThanOrEqual (
     *     value = 1
     *)
     */
    private $classRated;

    /**
     * @ORM\Column(type="string", length=500)
     * @Assert\NotBlank
     */
    private $rate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudentName(): ?string
    {
        return $this->studentName;
    }

    public function setStudentName(string $studentName): self
    {
        $this->studentName = $studentName;

        return $this;
    }

    public function getClassRated(): ?int
    {
        return $this->classRated;
    }

    public function setClassRated(int $classRated): self
    {
        $this->classRated = $classRated;

        return $this;
    }

    public function getRate(): ?string
    {
        return $this->rate;
    }

    public function setRate(string $rate): self
    {
        $this->rate = $rate;

        return $this;
    }
}
