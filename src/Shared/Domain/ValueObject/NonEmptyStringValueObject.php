<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;
use Symfony\Component\Validator\Constraints as Assert;

abstract class NonEmptyStringValueObject
{
    /**
     * @Assert\NotBlank
     */
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
