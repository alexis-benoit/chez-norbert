<?php


namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use DateTimeInterface;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class Booking
{
    /**
     * @var string|null
     * @Assert\NotBlank(
     *     message = "booking.constraints.firstName.notBlank"
     * )
     * @Assert\Length(
     *     max = 60,
     *     maxMessage = "booking.constraints.firstName.length.max"
     * )
     */
    private $firstName;

    /**
     * @var string|null
     * @Assert\NotBlank(
     *     message = "booking.constraints.lastName.notBlank"
     * )
     * @Assert\Length(
     *     max = 60,
     *     maxMessage = "booking.constraints.lastName.length.max"
     * )
     */
    private $lastName;

    /**
     * @var string|null
     * @Assert\NotBlank(
     *     message = "booking.constraints.email.notBlank"
     * )
     * @Assert\Email(
     *     message = "booking.constraints.email.email"
     * )
     * @Assert\Length(
     *     max = 200,
     *     maxMessage = "booking.constraints.email.length.max"
     * )
     */
    private $email;

    /**
     * @var string|null
     * @Assert\NotBlank(
     *  message = "booking.constraints.phone.notBlank"
     * )
     *
     * @Assert\Length(
     *  max = 20,
     *  maxMessage = "booking.constraints.phone.length.max"
     * )
     * @Assert\Regex(
     *     pattern= "/^(\+[0-9]{3,4})([0-9]{8,13})$/",
     *     message="booking.constraints.tel.regex",
     *     normalizer="App\Helper\PhoneNumberNormalizer::normalize"
     * )
     */
    private $phone;

    /**
     * @var DateTimeInterface
     * @Assert\Date(
     *     message = "booking.constraints.from.date"
     * )
     */
    private $from;

    /**
     * @var DateTimeInterface
     * @Assert\Date(
     *     message = "booking.constraints.from.date"
     * )
     */
    private $to;

    /**
     * @var int
     * @Assert\NotBlank(
     *     message = "booking.constraints.personsCount.notBlank"
     * )
     * @Assert\Length(
     *     maxMessage = "booking.constraints.personsCount.length.max",
     *     max = 5
     * )
     * @Assert\Positive(
     *     message = "booking.constraints.personCount.positive"
     * )
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

    /**
     * @Assert\Callback
     *
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    public function validate (ExecutionContextInterface $context, $payload) {
        $from = $context->getObject()->getFrom ();
        $to = $context->getObject()->getTo ();

        if ($from->getTimestamp() > $to->getTimestamp ()) {
            $context->buildViolation('booking.constraints.to.beforeFrom')
                ->atPath('to')
                ->addViolation();
        }
    }
}