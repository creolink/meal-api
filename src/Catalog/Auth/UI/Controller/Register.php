<?php

namespace App\Catalog\Auth\UI\Controller;

use App\Auth\Application\RegisterCommandHandler;
use App\Catalog\Auth\Application\Controller\RegisterCommand;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Register
{
    /**
     * @Route("/auth/register", name="register", methods={"POST"})
     * @ParamConverter("registerCommand")
     */
    public function __invoke(RegisterCommand $registerCommand, RegisterCommandHandler $commandHandler): Response
    {
        $user = $commandHandler->handle($registerCommand);

        return new JsonResponse([
            'user' => $user->getEmail()
        ]);
    }
}
