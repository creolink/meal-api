<?php

namespace App\Auth\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

interface UpgradeUserPasswordRepositoryInterface
{
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void;
}
