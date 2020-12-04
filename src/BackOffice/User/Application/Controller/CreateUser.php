<?php

namespace App\BackOffice\User\Application\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateUser
{
    /**
     * @Route("/adm/user", methods={"POST"})
     */
    public function __invoke(): Response
    {
        return new Response("users");
    }
}
