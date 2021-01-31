<?php

namespace App\Auth\Application;

use App\Auth\Domain\CreateUser;
use App\Auth\Domain\ValueObject\NewUser;
use App\Auth\Domain\UserCountry;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use App\Shared\Domain\Bus\Command\CommandHandler;

class CreateUserCommandHandler implements CommandHandler
{
    private CreateUser $registerUserBusiness;

    public function __construct(CreateUser $registerUserBusiness)
    {
        $this->registerUserBusiness = $registerUserBusiness;
    }

    public function handle(CreateUserCommand $registerCommand): void
    {
        $userDto = new NewUser(
            new UserEmail($registerCommand->getEmail()),
            new UserPassword($registerCommand->getPassword()),
            new UserCountry($registerCommand->getCountry())
        );

        $this->registerUserBusiness->checkAlreadyRegistered($userDto);
        $this->registerUserBusiness->create($userDto);
    }
}
