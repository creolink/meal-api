<?php

namespace App\Auth\Application;

use App\Auth\Domain\CreateUserService;
use App\Auth\Domain\UserRegisterDto;
use App\Auth\Domain\UserCountry;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use Shared\Domain\Bus\Command\CommandHandler;

class RegisterCommandHandler// implements CommandHandler
{
    private CreateUserService $registerUserBusiness;

    public function __construct(CreateUserService $registerUserBusiness)
    {
        $this->registerUserBusiness = $registerUserBusiness;
    }

    public function handle(RegisterCommand $registerCommand): void
    {
        $this->registerUserBusiness->create(
            new UserRegisterDto(
                new UserEmail($registerCommand->getEmail()),
                new UserPassword($registerCommand->getPassword()),
                new UserPassword($registerCommand->getRepeatedPassword()),
                new UserCountry($registerCommand->getCountry())
            )
        );
    }
}
