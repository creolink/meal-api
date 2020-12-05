<?php

namespace App\Auth\UI\Controller\ParamConverter;

use App\Auth\Application\RegisterCommand;
use App\Auth\Domain\Exception\InvalidUserDataException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegisterRequestParamConverter implements ParamConverterInterface
{
    public const CONVERTER_NAME = 'registerCommand';

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
            throw new InvalidUserDataException($e->getMessage());
        }

        $request->attributes->set($configuration->getName(), $userDto);

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getName() === self::CONVERTER_NAME;
    }

    private function createUserDto(Request $request): RegisterCommand
    {
        return new RegisterCommand(
            $request->get('email'),
            $request->get('password'),
            $request->get('repeated_password'),
            $request->get('country'),
        );
    }

    private function validate(RegisterCommand $userDto): void
    {
        $errors = $this->validator->validate($userDto);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            throw new InvalidUserDataException($errorsString);
        }
    }
}
