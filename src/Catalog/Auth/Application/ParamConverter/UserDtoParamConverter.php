<?php

namespace App\BackOffice\Controller\ParamConverter;

use App\BackOffice\Domain\Dto\NewUser;
use App\BackOffice\Domain\Exception\InvalidUserDataException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserDtoParamConverter implements ParamConverterInterface
{
    public const CONVERTER_NAME = 'userDto';

    private UserPasswordEncoderInterface $encoder;
    private ValidatorInterface $validator;

    public function __construct(UserPasswordEncoderInterface $encoder, ValidatorInterface $validator)
    {
        $this->encoder = $encoder;
        $this->validator = $validator;
    }

    public function apply(Request $request, ParamConverter $configuration): bool
    {
        try {
            $userDto = $this->createUserDto($request);
            $this->validate($userDto);
        } catch (\Throwable $e) {
            throw new InvalidUserDataException($e->getMessage(), 400);
        }

        $request->attributes->set($configuration->getName(), $userDto);

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getName() === self::CONVERTER_NAME;
    }

    private function createUserDto(Request $request): NewUser
    {
        return new NewUser(
            $request->get('email'),
            $request->get('password'),
            $request->get('repeated_password'),
            $request->get('country'),
        );
    }

    private function validate(NewUser $userDto): void
    {
        $errors = $this->validator->validate($userDto);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            throw new InvalidUserDataException($errorsString);
        }
    }

//    private function createUserDto(Request $request): User
//    {
//        $user = new CreateUser();
//
//        return $user
//            ->setEmail($request->get('email'))
//            ->setPassword($this->encoder->encodePassword($user, $request->get('password')))
//            ->setRoles([])
//            ->setCountryOfOrigin($request->get('country'))
//            ;
//    }
//
//    private function createUser(Request $request): User
//    {
//        $user = new CreateUser();
//
//        return $user
//            ->setEmail($request->get('email'))
//            ->setPassword($this->encoder->encodePassword($user, $request->get('password')))
//            ->setRoles([])
//            ->setCountryOfOrigin($request->get('country'))
//        ;
//    }
}
