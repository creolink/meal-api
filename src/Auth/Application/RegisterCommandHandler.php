<?php

namespace App\Auth\Application;

use App\Auth\Domain\CreateUserService;
use App\Auth\Domain\UserRegister;
use App\Auth\Domain\UserCountry;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use App\Shared\Domain\Bus\Command\CommandHandler;

class RegisterCommandHandler implements CommandHandler
{
    private CreateUserService $registerUserBusiness;

    public function __construct(CreateUserService $registerUserBusiness)
    {
        $this->registerUserBusiness = $registerUserBusiness;
    }

    public function handle(RegisterCommand $registerCommand): void
    {
        $userDto = new UserRegister(
            new UserEmail($registerCommand->getEmail()),
            new UserPassword($registerCommand->getPassword()),
            new UserPassword($registerCommand->getRepeatedPassword()),
            new UserCountry($registerCommand->getCountry())
        );

        $this->registerUserBusiness->userAlreadyExists($userDto);
        $this->registerUserBusiness->create($userDto);
    }
}
