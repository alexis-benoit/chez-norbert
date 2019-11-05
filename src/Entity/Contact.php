<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @Assert\NotBlank(
     *  message = "contact.constraints.lastName.notBlank"
     * )
     * 
     * @Assert\Length(
     *  max = 80,
     *  maxMessage = "contact.constraints.lastName.length.max"
     * )
     */
    private $lastName;

    /**
     * @Assert\NotBlank(
     *  message = "contact.constraints.firstName.notBlank"
     * )
     * 
     * @Assert\Length(
     *  max = 80,
     *  maxMessage = "contact.constrains.firstName.length.max"
     * )
     */
    private $firstName;

    /**
     * @Assert\NotBlank(
     *  message = "contact.constrains.email.notBlank"
     * )
     * 
     * @Assert\Email(
     *  message = "contact.constrains.email.email"
     * )
     * 
     * @Assert\Length(
     *  max = 200,
     *  maxMessage = "contact.constrains.email.length.max"
     * )
     */
    private $email;

    /**
     * @Assert\NotBlank(
     *  message = "contact.constrains.tel.notBlank"
     * )
     * 
     * @Assert\Length(
     *  max = 20,
     *  maxMessage = "contact.constrains.tel.length.max"
     * )
     * @Assert\Regex(
     *     pattern= "/^(\+[0-9]{3,4})([0-9]{8,13})$/",
     *     message="contact.constraints.tel.regex",
     *     normalizer="App\Helper\PhoneNumberNormalizer::normalize"
     * )
     */
    private $tel;

    /**
     * @Assert\NotBlank(
     *  message = "contact.constrains.message.notBlank"
     * )
     * 
     * @Assert\Length(
     *  max = 400,
     *  maxMessage = "contract.constrains.message.length.max"
     * )
     */
    private $message;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message): self
    {
        $this->message = $message;

        return $this;
    }
}
