<?php

namespace App\Auth\Domain\ValueObject;

use App\Auth\Domain\Exception\InvalidRepeatedPasswordException;
use App\Auth\Domain\Entity\UserCountry;
use App\Auth\Domain\Entity\UserEmail;
use App\Auth\Domain\Entity\UserPassword;
use App\Auth\Domain\Entity\UserRoles;
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
        parent::__construct($email, $password, $country, new UserRoles());

        $this->validatePasswords($repeatedPassword);
    }

    private function validatePasswords(UserPassword $password): void
    {
        if ($this->getPassword()->value() !== $password->value()) {
            throw new InvalidRepeatedPasswordException();
        }
    }
}
