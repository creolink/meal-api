<?php

namespace App\Auth\Domain\Register;

use App\Auth\Domain\Create\CreateUserDto;
use App\Auth\Domain\Exception\InvalidRepeatedPasswordException;
use App\Auth\Domain\UserCountry;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use App\Auth\Domain\UserType;
use Shared\Domain\Aggregate\AggregateRoot;

class RegisterUserDto extends CreateUserDto implements AggregateRoot, UserType
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
        if ($this->getPassword() !== $this->repeatedPassword) {
            throw new InvalidRepeatedPasswordException();
        }
    }
}
