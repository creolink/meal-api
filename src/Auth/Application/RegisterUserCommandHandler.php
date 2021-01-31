<?php

namespace App\Auth\Application;

use App\Auth\Domain\CreateUser;
use App\Auth\Domain\ValueObject\RegisterUser;
use App\Auth\Domain\Entity\UserCountry;
use App\Auth\Domain\Entity\UserEmail;
use App\Auth\Domain\Entity\UserPassword;
use App\Shared\Domain\Bus\Command\CommandHandler;

class RegisterUserCommandHandler implements CommandHandler
{
    private CreateUser $registerUserBusiness;

    public function __construct(CreateUser $registerUserBusiness)
    {
        $this->registerUserBusiness = $registerUserBusiness;
    }

    public function handle(RegisterUserCommand $registerCommand): void
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
