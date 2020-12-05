<?php

namespace App\Auth\UI\Controller;

use App\Auth\Application\RegisterCommand;
use App\Auth\Application\RegisterCommandHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @ParamConverter("registerCommand")
     */
    public function __invoke(RegisterCommand $registerCommand): Response
    {
        $this->commandHandler->handle($registerCommand);

        return new JsonResponse([
            'user' => $registerCommand->getEmail()
        ]);
    }
}
