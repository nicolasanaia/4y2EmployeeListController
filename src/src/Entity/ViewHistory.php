<?php

namespace App\Entity;

use App\Repository\ViewHistoryRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity(repositoryClass=ViewHistoryRepository::class)
 */
class ViewHistory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $hour;

    /**
     * @ORM\ManyToOne(targetEntity=Students::class, inversedBy="viewHistories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $student;

    public function __construct(){
        $this->hour = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHour(): \DateTimeInterface
    {
        return $this->hour;
    }

    public function setHour(\DateTimeInterface $hour): self
    {
        $this->hour = $hour;

        return $this;
    }

    public function getStudent(): ?Students
    {
        return $this->student;
    }

    public function setStudent(?Students $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function __toString(): string {
        return "Last view: ".$this->hour->format("d/m/Y H:i:s");
    }
}
