<?php

namespace App\Auth\Domain\Exception;

use Symfony\Component\HttpFoundation\Response;
use Throwable;

class InvalidUserDataException extends \RuntimeException
{
    public function __construct($message = "")
    {
        parent::__construct($message, Response::HTTP_BAD_REQUEST);
    }
}
