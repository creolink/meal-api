<?php

namespace App\Auth\Domain\ValueObject;

use App\Auth\Domain\Exception\InvalidRepeatedPasswordException;
use App\Auth\Domain\UserCountry;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use App\Auth\Domain\UserType;
use App\Shared\Domain\Aggregate\AggregateRoot;

class RegisterUser extends NewUser implements AggregateRoot, UserType
{
    public function __construct(
        UserEmail $email,
        UserPassword $password,
        UserPassword $repeatedPassword,
        UserCountry $country
    ) {
        parent::__construct($email, $password, $country);

        $this->validatePasswords($repeatedPassword);
    }

    private function validatePasswords(UserPassword $password): void
    {
        if ($this->getPassword()->value() !== $password->value()) {
            throw new InvalidRepeatedPasswordException();
        }
    }
}
