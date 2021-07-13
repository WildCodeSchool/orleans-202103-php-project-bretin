<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    private ?string $civility;

    /**
     * @Assert\Notblank
     * @Assert\Length(max="50")
     */
    private string $lastname;

    /**
     * @Assert\Notblank
     * @Assert\Length(max="50")
     */
    private string $firstname;

    /**
     * @Assert\Notblank
     * @Assert\Email
     * @Assert\Length(max="50")
     */
    private string $mail;

    /**
     * @Assert\Notblank
     * @Assert\Length(max="50")
     */
    private string $businessName;

    /**
     * @Assert\Length(max="50")
     */
    private ?string $job;

    /**
     * @Assert\Notblank
     */
    private string $situation;

    /**
     * @Assert\Notblank
     */
    private string $need;

    private ?string $urgent;

    private ?string $urgentResponse;

    private ?string $intervention;

    private ?string $constraint;

    private ?string $availability;

    public function getCivility(): ?string
    {
        return $this->civility;
    }

    public function setCivility(?string $civility): self
    {
        $this->civility = $civility;

        return $this;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getBusinessName(): string
    {
        return $this->businessName;
    }

    public function setBusinessName(string $businessName): self
    {
        $this->businessName = $businessName;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(?string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getSituation(): string
    {
        return $this->situation;
    }

    public function setSituation(string $situation): self
    {
        $this->situation = $situation;

        return $this;
    }

    public function getNeed(): string
    {
        return $this->need;
    }

    public function setNeed(string $need): self
    {
        $this->need = $need;

        return $this;
    }

    public function getUrgent(): ?string
    {
        return $this->urgent;
    }

    public function setUrgent(?string $urgent): self
    {
        $this->urgent = $urgent;

        return $this;
    }

    public function getUrgentResponse(): ?string
    {
        return $this->urgentResponse;
    }

    public function setUrgentResponse(?string $urgentResponse): self
    {
        $this->urgentResponse = $urgentResponse;

        return $this;
    }

    public function getIntervention(): ?string
    {
        return $this->intervention;
    }

    public function setIntervention(?string $intervention): self
    {
        $this->intervention = $intervention;

        return $this;
    }

    public function getConstraint(): ?string
    {
        return $this->constraint;
    }

    public function setConstraint(?string $constraint): self
    {
        $this->constraint = $constraint;

        return $this;
    }

    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    public function setAvailability(?string $availability): self
    {
        $this->availability = $availability;

        return $this;
    }
}
