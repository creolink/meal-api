<?php

namespace App\BackOffice\User\Application\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetUsers
{
    /**
     * @Route("/adm/users", methods={"GET"})
     */
    public function __invoke(): Response
    {
        return new Response("users");
    }
}
