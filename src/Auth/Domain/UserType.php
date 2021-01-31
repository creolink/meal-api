<?php

namespace App\Auth\Domain;

use App\Auth\Domain\Entity\UserCountry;
use App\Auth\Domain\Entity\UserEmail;
use App\Auth\Domain\Entity\UserPassword;

interface UserType
{
    public function getEmail(): UserEmail;
    public function getPassword(): UserPassword;
    public function getCountry(): UserCountry;
}
