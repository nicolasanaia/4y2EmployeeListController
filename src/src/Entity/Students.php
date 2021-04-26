<?php

namespace App\Entity;

use App\Repository\StudentsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StudentsRepository::class)
 */
class Students
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
    private $name;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=14)
     * @Assert\NotBlank
     */
    private $cpf;

    /**
     * @ORM\Column(type="boolean")
     */
    private $premiumStudentPlan;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getPremiumStudentPlan(): ?bool
    {
        return $this->premiumStudentPlan;
    }

    public function setPremiumStudentPlan(bool $premiumStudentPlan): self
    {
        $this->premiumStudentPlan = $premiumStudentPlan;

        return $this;
    }
}
