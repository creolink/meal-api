<?php

namespace App\BackOffice\User\Application\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateUser
{
    /**
     * @Route("/adm/user/{uuid}", methods={"PUT"})
     */
    public function __invoke(): Response
    {
        return new Response("user");
    }
}
