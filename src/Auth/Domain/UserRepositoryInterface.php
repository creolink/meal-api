<?php

namespace App\BackOffice\Infrastructure\Repository;

use Symfony\Component\Security\Core\User\UserInterface;

interface UserRepositoryInterface
{
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void;
}
