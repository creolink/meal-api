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

    public function checkCanBeRegistered(UserType $userDto)
    {
        return $this->repository->findOneByEmail($userDto->getEmail()) instanceof UserInterface ? false : true;
    }

    public function create(UserType $userDto): void
    {
        $user = new User();
        $user->setPassword($this->encodePassword($user, $userDto));
        $user->setEmail($userDto->getEmail());
        $user->setCountry($userDto->getCountry());

        $this->repository->create($user);
    }

    private function encodePassword(UserInterface $user, UserType $userDto): UserPassword
    {
        return new UserPassword($this->encoder->encodePassword($user, $userDto->getPassword()->value()));
    }
}
