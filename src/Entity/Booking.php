<?php


namespace App\Entity;


use DateTimeInterface;

class Booking
{
    /**
     * @var string|null
     */
    private $firstName;

    /**
     * @var string|null
     */
    private $lastName;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var DateTimeInterface
     */
    private $from;

    /**
     * @var DateTimeInterface
     */
    private $to;

    /**
     * @var int
     */
    private $personsCount;

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return Booking
     */
    public function setFirstName(?string $firstName): Booking
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return Booking
     */
    public function setLastName(?string $lastName): Booking
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return Booking
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return Booking
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getFrom(): ?DateTimeInterface
    {
        return $this->from;
    }

    /**
     * @param DateTimeInterface $from
     * @return Booking
     */
    public function setFrom(?DateTimeInterface $from): self
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getTo(): ?DateTimeInterface
    {
        return $this->to;
    }

    /**
     * @param DateTimeInterface $to
     * @return Booking
     */
    public function setTo(?DateTimeInterface $to): self
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return int
     */
    public function getPersonsCount(): ?int
    {
        return $this->personsCount;
    }

    /**
     * @param int $personsCount
     * @return Booking
     */
    public function setPersonsCount(?int $personsCount): self
    {
        $this->personsCount = $personsCount;
        return $this;
    }


}