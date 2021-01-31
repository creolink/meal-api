<?php

namespace App\Auth\Application;

use App\Auth\Domain\CreateUser;
use App\Auth\Domain\ValueObject\RegisterUser;
use App\Auth\Domain\UserCountry;
use App\Auth\Domain\UserEmail;
use App\Auth\Domain\UserPassword;
use App\Auth\Domain\UserRepository;
use App\Shared\Domain\Bus\Command\CommandHandler;

class DeleteUserCommandHandler implements CommandHandler
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(DeleteUserCommand $registerCommand): void
    {

        //$this->registerUserBusiness->userAlreadyExists($userDto);
        //$this->registerUserBusiness->create($userDto);
    }
}
