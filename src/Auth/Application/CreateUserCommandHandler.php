<?php

namespace App\Auth\Application;

use App\Auth\Domain\CreateUserService;
use App\Auth\Domain\Exception\UserAlreadyExistsException;
use App\Auth\Domain\UserRegisterDto;
use App\Auth\Domain\UserCountry;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use App\Shared\Domain\Bus\Command\CommandHandler;

class CreateUserCommandHandler implements CommandHandler
{
    private CreateUserService $registerUserBusiness;

    public function __construct(CreateUserService $registerUserBusiness)
    {
        $this->registerUserBusiness = $registerUserBusiness;
    }

    public function handle(RegisterCommand $registerCommand): void
    {
        $userDto = new UserRegisterDto(
            new UserEmail($registerCommand->getEmail()),
            new UserPassword($registerCommand->getPassword()),
            new UserPassword($registerCommand->getRepeatedPassword()),
            new UserCountry($registerCommand->getCountry())
        );

        if ($this->registerUserBusiness->checkCanBeRegistered($userDto)) {
            $this->registerUserBusiness->create($userDto);

            return;
        }

        throw new UserAlreadyExistsException();
    }
}
