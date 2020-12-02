<?php

namespace App\Security\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetUsers
{
    /**
     * @Route("/users", methods={"GET"})
     */
    public function __invoke(): Response
    {
        return new Response("users");
    }
}
