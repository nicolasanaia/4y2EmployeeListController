<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=GradeRepository::class)
 */
class Grade
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
     * @ORM\Column(type="float")
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 0,
     *      max = 10,
     *      notInRangeMessage = "You must insert between {{ min }} and {{ max }}",
     * )
     */
    private $studentGrade;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $teacherName;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\GreaterThanOrEqual (
     *     value = 1
     *)
     */
    private $testNumber;

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

    public function getStudentGrade(): ?float
    {
        return $this->studentGrade;
    }

    public function setStudentGrade(float $studentGrade): self
    {
        $this->studentGrade = $studentGrade;

        return $this;
    }

    public function getTeacherName(): ?string
    {
        return $this->teacherName;
    }

    public function setTeacherName(string $teacherName): self
    {
        $this->teacherName = $teacherName;

        return $this;
    }

    public function getTestNumber(): ?int
    {
        return $this->testNumber;
    }

    public function setTestNumber(int $testNumber): self
    {
        $this->testNumber = $testNumber;

        return $this;
    }
}
