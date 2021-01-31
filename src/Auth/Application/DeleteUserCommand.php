<?php

namespace App\Auth\Application;

use App\Shared\Domain\Bus\Command\Command;

class DeleteUserCommand implements Command
{
    private string $id = '';

    public function __construct(string $id = '')
    {
        $this->id = $id;
    }
}
