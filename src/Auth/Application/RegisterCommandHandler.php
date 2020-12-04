<?php

namespace App\Auth\Application;

use App\Auth\Infrastructure\Doctrine\Entity\User;
use Shared\Domain\Bus\Command\Command;
use Shared\Domain\Bus\Command\CommandHandler;

class RegisterCommandHandler implements CommandHandler
{
    public function __construct()
    {
    }

    public function handle(Command $registerCommand): User
    {

    }
}
