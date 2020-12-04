<?php

namespace App\Auth\Infrastructure\Persistance\Doctrine\Entity;

use App\Auth\Infrastructure\Persistance\Doctrine\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use App\Auth\Domain\User as DomainUser;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
final class User extends DomainUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    protected UuidInterface $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    protected string $email;

    /**
     * @ORM\Column(type="json")
     */
    protected array $roles = [];

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    protected string $password;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    protected string $country;
}
