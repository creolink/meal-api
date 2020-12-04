<?php

namespace App\Auth\Domain;

interface UserType
{
    public function getEmail(): UserEmail;
    public function getPassword(): UserPassword;
    public function getCountry(): UserCountry;
}
