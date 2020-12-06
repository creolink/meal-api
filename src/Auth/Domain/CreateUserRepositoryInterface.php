<?php

namespace App\Auth\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

interface CreateUserRepositoryInterface
{
    public function create(UserInterface $user);
    public function findOneByEmail(UserEmail $email): ?UserInterface;
}
