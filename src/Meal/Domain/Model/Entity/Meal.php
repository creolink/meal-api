<?php

namespace App\Meal\Domain\Model\Entity;

use App\Security\Domain\Model\Entity\User;
use Ramsey\Uuid\UuidInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ramsey\Uuid\Doctrine\UuidGenerator;

/**
 * @ORM\Entity
 */
class Meal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private UuidInterface $id;

    /**
     * @ORM\Column
     * @Assert\NotBlank
     */
    private string $title;

    /**
     * @ORM\Column
     * @Assert\NotBlank
     */
    private string $type;

    /**
     * @ORM\Column(type="integer", length=4)
     * @Assert\GreaterThanOrEqual(0)
     * @Assert\Type("numeric")
     */
    private int $calories;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\Type("numeric")
     */
    private bool $isPublic;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    public User $owner;

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function setId(UuidInterface $id): Meal
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Meal
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Meal
    {
        $this->type = $type;

        return $this;
    }

    public function getCalories(): int
    {
        return $this->calories;
    }

    public function setCalories(int $calories): Meal
    {
        $this->calories = $calories;

        return $this;
    }

    public function isPublic(): bool
    {
        return $this->isPublic;
    }

    public function setIsPublic(bool $isPublic): Meal
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    public function getOwner(): User
    {
        return $this->owner;
    }

    public function setOwner(User $owner): Meal
    {
        $this->owner = $owner;
        return $this;
    }
}
