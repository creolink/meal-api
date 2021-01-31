<?php

namespace App\Auth\UI\Controller;

use App\Auth\Application\DeleteUserCommand;
use App\Auth\Application\DeleteUserCommandHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteUser
{
    private DeleteUserCommandHandler $commandHandler;

    public function __construct(DeleteUserCommandHandler $commandHandler)
    {
        $this->commandHandler = $commandHandler;
    }

    /**
     * @Route("/user/{uuid}", name="delete", methods={"DELETE"})
     */
    public function __invoke(Request $request): Response
    {
        $user = new DeleteUserCommand(
            $request->get('uuid')
        );

        $this->commandHandler->handle($user);

        return new JsonResponse([
            'User has been deleted'
        ]);
    }
}
