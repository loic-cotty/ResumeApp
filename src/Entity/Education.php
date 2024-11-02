<?php

namespace App\Entity;

use App\Repository\EducationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducationRepository::class)]
#[ORM\Table(name: "resume_education")]
class Education
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $degree = null;

    #[ORM\Column(length: 255)]
    private ?string $institution = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $location = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'educations')]
    private ?Resume $resume = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDegree(): ?string
    {
        return $this->degree;
    }

    public function setDegree(string $degree): static
    {
        $this->degree = $degree;

        return $this;
    }

    public function getInstitution(): ?string
    {
        return $this->institution;
    }

    public function setInstitution(string $institution): static
    {
        $this->institution = $institution;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getResume(): ?Resume
    {
        return $this->resume;
    }

    public function setResume(?Resume $resume): static
    {
        $this->resume = $resume;

        return $this;
    }
}
