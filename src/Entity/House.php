<?php

namespace App\Entity;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HouseRepository")
 * @UniqueEntity(
 *  fields={"name", "slug"}
 * )
 */
class House
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank(
     *     message = "house.constraints.name.notBlank"
     * )
     * @Assert\Length(
     *     max = 255,
     *     maxMessage = "house.constraint.name.length.max"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Positive(
     *     message = "house.constraints.peopleNumber.positive"
     * )
     */
    private $peopleNumber;

    /**
     * @ORM\Column(type="string", length=2000)
     * @Assert\NotBlank(
     *     message = "house.constraints.description.notBlank"
     * )
     * @Assert\Length(
     *     max = 255,
     *     maxMessage = "house.constraint.description.length.max"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="json")
     */
    private $advantage = [];

    /**
     * @ORM\Column(type="smallint")
     * @Assert\Choice(
     *     callback={"App\Entity\House", "getTypes"},
     *     message="house.constraint.type.choice"
     * )
     */
    private $type;

    public static $houseTypes = [
        0 => 'House',
        1 => 'Guest room'
    ];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

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

    public function getPeopleNumber(): ?int
    {
        return $this->peopleNumber;
    }

    public function setPeopleNumber(int $peopleNumber): self
    {
        $this->peopleNumber = $peopleNumber;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAdvantage(): ?array
    {
        return $this->advantage;
    }

    public function setAdvantage(array $advantage): self
    {
        $this->advantage = $advantage;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTypeName (): string {
        return self::$houseTypes[$this->getType()];
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTypes (): array {
        return self::$houseTypes;
    }
}
