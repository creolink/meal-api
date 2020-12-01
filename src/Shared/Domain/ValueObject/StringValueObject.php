<?php

declare(strict_types=1);

namespace CodelyTv\Shared\Domain\ValueObject;

abstract class StringValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }
}
