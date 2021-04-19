<?php


namespace App\Entity;


class Employee
{
    private string $nome;
    private string $position;
    private int $age;

    /**
     * Livro constructor.
     * @param string $name
     * @param string $position
     * @param int $age
     */
    public function __construct(string $name, string $position, int $age)
    {
        $this->name = $name;
        $this->position = $position;
        $this->age = $age;
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