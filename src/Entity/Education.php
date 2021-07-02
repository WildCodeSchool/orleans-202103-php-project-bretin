<?php

namespace App\Entity;

use App\Repository\EducationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EducationRepository::class)
 * @UniqueEntity("name", message="Cet élément existe déjà")
 */
class Education
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank(message="Veuillez saisir un nom de diplôme ou de formation")
     * @Assert\Length(max="255", maxMessage="Le nom saisi {{ value }} est trop long,
     * il ne devrait pas dépasser {{ limit }} caractères")
     */
    private string $name;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Veuillez saisir une année")
     */
    private int $obtentionYear;

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

    public function getObtentionYear(): ?int
    {
        return $this->obtentionYear;
    }

    public function setObtentionYear(int $obtentionYear): self
    {
        $this->obtentionYear = $obtentionYear;

        return $this;
    }
}
