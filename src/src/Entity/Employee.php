<?php

namespace App\Entity;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=EmployeeRepository::class)
 * @ORM\Table(name="employee")
 */


class Employee
{

    /**
 * @ORM\Id
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue
 */

    private int $id;

    /** @ORM\Column(type="string", nullable=false)
     *  @Assert\NotBlank
     * @Assert\Type(type="string")
     */
    private string $name;
    /** @ORM\Column(type="string", nullable=false)
    *   @Assert\NotBlank
     * @Assert\Choice({"Sr Developer", "Jr Developer", "Apprentice", "Developer", "Intern", "CTO"})
    */
    private string $position;
    /** @ORM\Column(type="integer", nullable=false)
     *  @Assert\NotBlank
     *  @Assert\GreaterThanOrEqual(
     *     value = 18
     *)
     * @Assert\Type(
     * type="integer",
     * message="The value is not valid."
     * )
     *
     */
    private int $age;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }


}