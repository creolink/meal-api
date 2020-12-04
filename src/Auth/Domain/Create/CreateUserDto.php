<?php

namespace App\Auth\Domain\Create;

use App\Auth\Domain\UserCountry;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use App\Auth\Domain\UserType;
use Shared\Domain\Aggregate\AggregateRoot;

class CreateUserDto implements AggregateRoot, UserType
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
