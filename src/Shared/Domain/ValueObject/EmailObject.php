<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;
use Symfony\Component\Validator\Constraints as Assert;

abstract class EmailObject
{
    /**
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    private string $email = '';

    public function __construct(string $email)
    {
        $this->email = $email;
    }
}
