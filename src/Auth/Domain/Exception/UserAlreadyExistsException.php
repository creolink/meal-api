<?php

namespace App\Auth\Domain\Exception;

class UserAlreadyExistsException extends \RuntimeException
{
    private const MESSAGE = 'User already exists';

    public function __construct()
    {
        parent::__construct(self::MESSAGE);
    }
}
