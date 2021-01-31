<?php

namespace App\BackOffice\User\UI\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetUser
{
    /**
     * @Route("/adm/user/{uuid}", methods={"GET"})
     */
    public function __invoke(): Response
    {
        return new Response("user");
    }
}
