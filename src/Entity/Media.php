<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use \DateTime;
use DateTimeInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 * @Vich\Uploadable
 */
#[ORM\Entity(repositoryClass:"App\Repository\MediaRepository")]
#[Vich\Uploadable]
class Media
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    #[ORM\Id()]
    #[ORM\GeneratedValue()]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    /**
     * @Vich\UploadableField(mapping="media_images", fileNameProperty="filename")
     * @var File
     *
     * @Assert\Image(
     *     maxSize = "4M"
     * )
     */
    #[Vich\UploadableField(mapping: "media_images", fileNameProperty: "filename")]
    #[Assert\Image(maxSize: "4M")]
    private ?File $imageFile = null;

    /**
     * @ORM\Column(type="string", length=400)
     */
    #[ORM\Column(type: "string", length: 400, nullable: true)]
    private ?string $filename = null;

    /**
     * @ORM\Column(type="datetime")
     */
    #[ORM\Column(type: "datetime")]
    private ?DateTimeInterface $updatedAt = null;

    /**
     * @ORM\Column(type="string", length=600)
     * @Assert\NotBlank(
     *     message = "media.constraints.alt.blank"
     * )
     * @Assert\Length(
     *     max = 255,
     *     maxMessage = "media.constraints.alt.length.max"
     * )
     */
    #[ORM\Column(type: "string", length: 600)]
    #[Assert\NotBlank(message: "media.constraints.alt.blank")]
    #[Assert\Length(max: 255, maxMessage: "media.constraints.alt.length.max")]
    private ?string $alt = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\House", inversedBy="medias")
     * @ORM\JoinColumn(nullable=false)
     */
    #[ORM\ManyToOne(targetEntity: "App\Entity\House", inversedBy: "medias")]
    #[ORM\JoinColumn(nullable: false)]
    private ?House $house = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     * @return Media
     * @throws \Exception
     */
    public function setImageFile(File $imageFile = null): Media
    {
        $this->imageFile = $imageFile;

        if ($imageFile instanceof UploadedFile) {
            $this->updatedAt = new DateTime('now');
        }

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function __toString()
    {
        return $this->getFilename();
    }

    public function getHouse(): ?House
    {
        return $this->house;
    }

    public function setHouse(?House $house): self
    {
        $this->house = $house;

        return $this;
    }
}
