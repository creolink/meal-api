<?php

namespace App\Auth\Domain;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreateUserService
{
    private CreateUserRepositoryInterface $repository;
    private UserPasswordEncoderInterface $encoder;
    private ValidatorInterface $validator;

    public function __construct(CreateUserRepositoryInterface $repository, UserPasswordEncoderInterface $encoder, ValidatorInterface $validator)
    {
        $this->repository = $repository;
        $this->encoder = $encoder;
        $this->validator = $validator;
    }

    public function create(UserType $userDto): void
    {
        $user = new User();
        $user->setPassword(new UserPassword($this->encodePassword($user, $userDto->getPassword()->value())));
        $user->setEmail($userDto->getEmail());
        $user->setCountry($userDto->getCountry()->value());
        $user->setRoles(new UserRoles());

        $this->repository->create($user);
    }

    private function encodePassword(UserInterface $user, string $newUser)
    {
        return $this->encoder->encodePassword($user, $newUser);
    }
}
