<?php

namespace App\Auth\Domain;

use App\Auth\Domain\Exception\InvalidRepeatedPasswordException;
use App\Shared\Domain\Aggregate\AggregateRoot;

class UserRegister extends UserCreate implements AggregateRoot, UserType
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
