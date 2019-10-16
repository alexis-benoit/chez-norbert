<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use \DateTime;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 * @Vich\Uploadable
 */
class Media
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *     message = "media.constraints.name.blank"
     * )
     * @Assert\Length(
     *     max = 255,
     *     maxMessage = "media.constraints.name.length.max"
     * )
     */
    private $name;

    /**
     * @Vich\UploadableField(mapping="media_images", fileNameProperty="filename")
     * @var File
     *
     * @Assert\Image(
     *     maxSize = "4M"
     * )
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $filename;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

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
    private $alt;

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


}
