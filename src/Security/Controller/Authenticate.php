<?php

namespace App\Security\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Authenticate
{
    /**
     * @Route("/auth/authenticate", methods={"POST"})
     */
    public function __invoke(): Response
    {
        return new Response("xxx");
    }
}
