<?php

namespace App\Auth\Application;

use App\Auth\Domain\CreateUser;
use App\Auth\Domain\ValueObject\RegisterUser;
use App\Auth\Domain\UserCountry;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use App\Shared\Domain\Bus\Command\CommandHandler;

class RegisterCommandHandler implements CommandHandler
{
    private CreateUser $registerUserBusiness;

    public function __construct(CreateUser $registerUserBusiness)
    {
        $this->registerUserBusiness = $registerUserBusiness;
    }

    public function handle(RegisterCommand $registerCommand): void
    {
        $user = new RegisterUser(
            new UserEmail($registerCommand->getEmail()),
            new UserPassword($registerCommand->getPassword()),
            new UserPassword($registerCommand->getRepeatedPassword()),
            new UserCountry($registerCommand->getCountry())
        );

        $this->registerUserBusiness->checkAlreadyRegistered($user);
        $this->registerUserBusiness->create($user);
    }
}
