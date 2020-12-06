<?php

namespace App\Auth\UI\Controller;

use App\Auth\Application\CreateUserCommand;
use App\Auth\Application\CreateUserCommandHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateUser
{
    private CreateUserCommandHandler $commandHandler;

    public function __construct(CreateUserCommandHandler $commandHandler)
    {
        $this->commandHandler = $commandHandler;
    }

    /**
     * @Route("/user/create", name="create", methods={"POST"})
     */
    public function __invoke(Request $request): Response
    {
        $createCommand = new CreateUserCommand(
            $request->get('email'),
            $request->get('password'),
            $request->get('country'),
        );

        $this->commandHandler->handle($createCommand);

        return new JsonResponse([
            'user' => $createCommand->getEmail()
        ]);
    }
}
