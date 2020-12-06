<?php

namespace App\Auth\Domain;

use App\Auth\Domain\Exception\InvalidRepeatedPasswordException;
use Shared\Domain\Aggregate\AggregateRoot;

class UserRegisterDto extends User implements AggregateRoot, UserType
{
    public function __construct(
        UserEmail $email,
        UserPassword $password,
        UserPassword $repeatedPassword,
        UserCountry $country
    ) {
        parent::__construct();

        $this->setEmail($email);
        $this->setPassword($password);
        $this->setCountry($country);

        $this->validatePasswords($repeatedPassword);
    }

    private function validatePasswords(UserPassword $password): void
    {
        if ($this->getPassword()->value() !== $password->value()) {
            throw new InvalidRepeatedPasswordException();
        }
    }
}
