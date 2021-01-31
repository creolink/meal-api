<?php

namespace App\Auth\UI\Controller;

use App\Auth\Application\RegisterUserCommand;
use App\Auth\Application\RegisterUserCommandHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Register
{
    private RegisterUserCommandHandler $commandHandler;

    public function __construct(RegisterUserCommandHandler $commandHandler)
    {
        $this->commandHandler = $commandHandler;
    }

    /**
     * @Route("/auth/register", name="register", methods={"POST"})
     */
    public function __invoke(Request $request): Response
    {
        $registerCommand = new RegisterUserCommand(
            $request->get('email'),
            $request->get('password'),
            $request->get('repeated_password'),
            $request->get('country')
        );

        $this->commandHandler->handle($registerCommand);

        return new JsonResponse([
            'user' => $registerCommand->getEmail()
        ]);
    }
}
