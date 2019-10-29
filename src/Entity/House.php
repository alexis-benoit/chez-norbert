<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
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
     *     max = 800,
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
     *     callback={"App\Entity\House", "getTypesNumbers"},
     *     message="house.constraint.type.choice"
     * )
     */
    private $type;

    public static $houseTypes = [
        0 => 'House',
        1 => 'Guest room'
    ];

    private static $houseTypesNumbers = [
        0, 1
    ];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Media", mappedBy="house", orphanRemoval=true, cascade={"persist"})
     */
    private $medias;

    /**
     * @Assert\All({
     *   @Assert\Image(mimeTypes="image/jpeg")
     * })
     */
    private $images;

    public function __construct()
    {
        $this->medias = new ArrayCollection();
    }

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

    public function getTypes (): array
    {
        return self::$houseTypes;
    }

    public function getTypesNumbers () : array {
        return self::$houseTypesNumbers;
    }

    /**
     * @return Collection|Media[]
     */
    public function getMedias(): Collection
    {
        return $this->medias;
    }

    public function addMedia(Media $media): self
    {
        if (!$this->medias->contains($media)) {
            $this->medias[] = $media;
            $media->setHouse($this);
        }

        return $this;
    }

    public function removeMedia(Media $media): self
    {
        if ($this->medias->contains($media)) {
            $this->medias->removeElement($media);
            // set the owning side to null (unless already changed)
            if ($media->getHouse() === $this) {
                $media->setHouse(null);
            }
        }

        return $this;
    }

    public function getFirstMedia () : ?Media {
        return $this->medias[0] ?? null;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     * @return House
     * @throws \Exception
     */
    public function setImages($images) : self
    {
        $this->images = $images;

        foreach ($images as $image) {
            $media = new Media();
            $media
                ->setName(' ')
                ->setAlt(' ')
                ->setImageFile($image)
            ;

            $this->addMedia($media);
        }

        return $this;
    }
}
