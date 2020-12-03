<?php

namespace App\Security\Domain\Model;

interface UserRoles
{
    public const ROLE_ALL_USERS_EDIT = 'ROLE_ALL_USERS_EDIT';
    public const ROLE_OWNED_USER_EDIT = 'ROLE_OWNED_USER_EDIT';

    public const ROLE_USER = 'ROLE_USER';
}
