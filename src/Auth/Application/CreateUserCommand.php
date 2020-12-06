<?php

namespace App\Auth\Application;

use Shared\Domain\Bus\Command\Command;

class CreateUserCommand implements Command
{
    private string $email = '';
    private string $password = '';
    private string $country = '';
    private string $repeatedPassword = '';

    public function __construct(
        ?string $email = '',
        ?string $password = '',
        ?string $repeatedPassword = '',
        ?string $country = ''
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->repeatedPassword = $repeatedPassword;
        $this->country = $country;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRepeatedPassword(): string
    {
        return $this->repeatedPassword;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
}
