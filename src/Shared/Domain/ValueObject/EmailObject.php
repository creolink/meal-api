<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use InvalidArgumentException;

abstract class EmailObject extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);

        $this->ensureEmailIsValid();
    }

    public function __toString()
    {
        return $this->value();
    }

    private function ensureEmailIsValid()
    {
        if (!filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf('Provided string <%s> is not a valid Email.', $this->value));
        }
    }
}
