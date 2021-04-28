<?php

namespace App\Entity;

use App\Repository\StudentsClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentsClassRepository::class)
 */
class StudentsClass
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
    private $weekDay;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $classSchedule;

    /**
     * @ORM\ManyToMany(targetEntity=Students::class, inversedBy="studentsClasses")
     */
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeekDay(): ?string
    {
        return $this->weekDay;
    }

    public function setWeekDay(string $weekDay): self
    {
        $this->weekDay = $weekDay;

        return $this;
    }

    public function getClassSchedule(): ?string
    {
        return $this->classSchedule;
    }

    public function setClassSchedule(string $classSchedule): self
    {
        $this->classSchedule = $classSchedule;

        return $this;
    }

    /**
     * @return Collection|Students[]
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudent(Students $student): self
    {
        if (!$this->students->contains($student)) {
            $this->students[] = $student;
        }

        return $this;
    }

    public function removeStudent(Students $student): self
    {
        $this->students->removeElement($student);

        return $this;
    }

    function __toString() {
        return $this->weekDay." - ".$this->classSchedule;
    }
}
