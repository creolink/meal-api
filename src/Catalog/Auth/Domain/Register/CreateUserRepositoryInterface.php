<?php

namespace App\BackOffice\Application;

use Symfony\Component\Security\Core\User\UserInterface;

interface CreateUserRepositoryInterface
{
    public function createNewUser(UserInterface $user): UserInterface;
}
