<?php

namespace App\Auth\Domain;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class CreateUserService
{
    private CreateUserRepositoryInterface $repository;
    private UserPasswordEncoderInterface $encoder;

    public function __construct(CreateUserRepositoryInterface $repository, UserPasswordEncoderInterface $encoder)
    {
        $this->repository = $repository;
        $this->encoder = $encoder;
    }

    public function create(UserType $userDto): void
    {
        $user = new User();
        $user->setPassword($this->encodePassword($user, $userDto->getPassword()->value()));
        $user->setEmail($userDto->getEmail());
        $user->setCountry($userDto->getCountry());

        $this->repository->create($user);
    }

    private function encodePassword(UserInterface $user, string $newUser)
    {
        return $this->encoder->encodePassword($user, $newUser);
    }
}
