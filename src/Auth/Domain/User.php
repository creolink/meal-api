<?php

namespace App\Auth\Domain;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    private UuidInterface $id;
    private UserEmail $email;
    private UserRoles $roles;
    private UserPassword $password;
    private string $country;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    public function getId(): UuidInterface
    {
        return Uuid::fromString($this->id);
    }

    public function getEmail(): UserEmail
    {
        return $this->email;
    }

    public function setEmail(UserEmail $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        return $this->roles->value();
    }

    public function setRoles(UserRoles $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): UserPassword
    {
        return $this->password;
    }

    public function setPassword(UserPassword $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
