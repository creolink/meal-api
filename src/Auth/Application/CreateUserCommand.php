<?php

namespace App\Auth\Application;

use App\Shared\Domain\Bus\Command\Command;

class CreateUserCommand implements Command
{
    private string $email = '';
    private string $password = '';
    private string $country = '';

    public function __construct(
        string $email = '',
        string $password = '',
        string $country = ''
    ) {
        $this->email = $email;
        $this->password = $password;
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

    public function getCountry(): string
    {
        return $this->country;
    }
}
