<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use InvalidArgumentException;

abstract class NonEmptyStringValueObject extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);

        $this->ensureValueIsNotEmpty();
    }

    private function ensureValueIsNotEmpty()
    {
        if (empty($this->value)) {
            throw new InvalidArgumentException('Value cannot be empty');
        }
    }
}
