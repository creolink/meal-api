<?php

namespace App\Auth\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

interface UserRepository
{
    public function save(UserInterface $user);
    public function findOneByEmail(UserEmail $email): ?UserInterface;
}
