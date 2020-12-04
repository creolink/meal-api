<?php

namespace App\Auth\Application;

use App\Catalog\Domain\Exception\InvalidRepeatedPasswordException;
use Symfony\Component\Validator\Constraints as Assert;
use Shared\Domain\Bus\Command\Command;

class RegisterCommand implements Command
{
    /**
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    private string $email = '';

    /**
     * @Assert\NotBlank
     */
    private string $password = '';

    /**
     * @Assert\NotBlank
     */
    private string $country = '';

    /**
     * @Assert\NotBlank
     */
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

        $this->validatePasswords();
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

    private function validatePasswords(): void
    {
        if ($this->password !== $this->repeatedPassword) {
            throw new InvalidRepeatedPasswordException();
        }
    }
}
