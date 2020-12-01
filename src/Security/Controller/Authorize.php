<?php

namespace App\Security\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Authorize
{
    /**
     * @Route("/auth/authorize", methods={"POST"})
     */
    public function __invoke(): Response
    {
        return new Response("xxx");
    }
}
