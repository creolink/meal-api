<?php

namespace App\Auth\Application;

use App\Auth\Domain\CreateUser;
use App\Auth\Domain\ValueObject\NewUser;
use App\Auth\Domain\Entity\UserCountry;
use App\Auth\Domain\Entity\UserEmail;
use App\Auth\Domain\Entity\UserPassword;
use App\Shared\Domain\Bus\Command\CommandHandler;

class CreateUserCommandHandler implements CommandHandler
{
    private CreateUser $registerUserBusiness;

    public function __construct(CreateUser $registerUserBusiness)
    {
        $this->registerUserBusiness = $registerUserBusiness;
    }

    public function handle(CreateUserCommand $createUserCommand): void
    {
        $userDto = new NewUser(
            new UserEmail($createUserCommand->getEmail()),
            new UserPassword($createUserCommand->getPassword()),
            new UserCountry($createUserCommand->getCountry())
        );

        $this->registerUserBusiness->checkAlreadyRegistered($userDto);
        $this->registerUserBusiness->create($userDto);
    }
}
