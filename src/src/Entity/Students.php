<?php

namespace App\Entity;

use App\Repository\StudentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToOne(targetEntity="Address", mappedBy="students", cascade={"ALL"})
     */
    private Address $address;

    /**
     * @ORM\Column(type="boolean")
     */
    private $premiumStudentPlan;

    /**
     * @ORM\ManyToOne(targetEntity=Unit::class, inversedBy="students")
     */
    private $unit;

    /**
     * @ORM\ManyToMany(targetEntity=StudentsClass::class, mappedBy="students")
     */
    private $studentsClasses;

    public function __construct()
    {
        $this->studentsClasses = new ArrayCollection();
    }

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

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
        $address->setStudents($this);
    }

    public function getUnit(): ?Unit
    {
        return $this->unit;
    }

    public function setUnit(?Unit $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * @return Collection|StudentsClass[]
     */
    public function getStudentsClasses(): Collection
    {
        return $this->studentsClasses;
    }

    public function addStudentsClass(StudentsClass $studentsClass): self
    {
        if (!$this->studentsClasses->contains($studentsClass)) {
            $this->studentsClasses[] = $studentsClass;
            $studentsClass->addStudent($this);
        }

        return $this;
    }

    public function removeStudentsClass(StudentsClass $studentsClass): self
    {
        if ($this->studentsClasses->removeElement($studentsClass)) {
            $studentsClass->removeStudent($this);
        }

        return $this;
    }

    function __toString() {
        return $this->name;
    }

}
