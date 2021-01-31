<?php

namespace App\Auth\Domain\ValueObject;

use App\Auth\Domain\Entity\UserCountry;
use App\Auth\Domain\Entity\UserEmail;
use App\Auth\Domain\Entity\UserPassword;
use App\Auth\Domain\Entity\UserRoles;
use App\Auth\Domain\UserType;
use App\Shared\Domain\Aggregate\AggregateRoot;

class NewUser implements AggregateRoot, UserType
{
    private UserEmail $email;
    private UserPassword $password;
    private UserCountry $country;
    private UserRoles $roles;

    public function __construct(
        UserEmail $email,
        UserPassword $password,
        UserCountry $country,
        UserRoles $roles
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->country = $country;
        $this->roles = $roles;
    }

    public function getEmail(): UserEmail
    {
        return $this->email;
    }

    public function getPassword(): UserPassword
    {
        return $this->password;
    }

    public function getCountry(): UserCountry
    {
        return $this->country;
    }

    public function getRoles(): UserRoles
    {
        return $this->roles;
    }
}
