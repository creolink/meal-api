<?php

namespace App\BackOffice\Application\Register;

use App\BackOffice\Application\CreateUserRepositoryInterface;
use App\BackOffice\Domain\Dto\NewUser;
use App\Security\Domain\Model\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserCreator
{
    private CreateUserRepositoryInterface $repository;
    private UserPasswordEncoderInterface $encoder;

    public function __construct(CreateUserRepositoryInterface $repository, UserPasswordEncoderInterface $encoder)
    {
        $this->repository = $repository;
        $this->encoder = $encoder;
    }

    public function create(NewUser $userDto): UserInterface
    {
        $user = new User();
        $user->setPassword($this->encodePassword($user, $userDto));
        $user->setEmail($userDto->getEmail());
        $user->setCountry($userDto->getCountry());

        return $this->repository->createNewUser($user);
    }

    private function encodePassword(UserInterface $user, NewUser $newUser)
    {
        return $this->encoder->encodePassword($user, $newUser->getPassword());
    }
}
