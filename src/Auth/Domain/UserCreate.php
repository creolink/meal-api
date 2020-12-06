<?php

namespace App\Auth\Domain;

use App\Shared\Domain\Aggregate\AggregateRoot;

class UserCreate implements AggregateRoot, UserType
{
    private UserEmail $email;
    private UserPassword $password;
    private UserCountry $country;

    public function __construct(
        UserEmail $email,
        UserPassword $password,
        UserCountry $country
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->country = $country;
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
}
