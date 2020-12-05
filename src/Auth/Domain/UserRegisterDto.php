<?php

namespace App\Auth\Domain;

use App\Auth\Domain\Exception\InvalidRepeatedPasswordException;
use Shared\Domain\Aggregate\AggregateRoot;

class UserRegisterDto extends UserCreateDto implements AggregateRoot, UserType
{
    private UserPassword $repeatedPassword;

    public function __construct(
        UserEmail $email,
        UserPassword $password,
        UserPassword $repeatedPassword,
        UserCountry $country
    ) {
        parent::__construct($email, $password, $country);

        $this->repeatedPassword = $repeatedPassword;

        $this->validatePasswords();
    }

    private function validatePasswords(): void
    {
        if ($this->getPassword()->value() !== $this->repeatedPassword->value()) {
            throw new InvalidRepeatedPasswordException();
        }
    }
}
