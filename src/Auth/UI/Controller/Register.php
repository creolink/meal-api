<?php

namespace App\Auth\UI\Controller;

use App\Auth\Application\RegisterCommand;
use App\Auth\Application\RegisterCommandHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Register
{
    private RegisterCommandHandler $commandHandler;

    public function __construct(RegisterCommandHandler $commandHandler)
    {
        $this->commandHandler = $commandHandler;
    }

    /**
     * @Route("/auth/register", name="register", methods={"POST"})
     */
    public function __invoke(Request $request): Response
    {
        $registerCommand = new RegisterCommand(
            $request->get('email'),
            $request->get('password'),
            $request->get('repeated_password'),
            $request->get('country'),
        );

        $this->commandHandler->handle($registerCommand);

        return new JsonResponse([
            'user' => $registerCommand->getEmail()
        ]);
    }
}
