<?php

namespace App\Security\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Check
{
    /**
     * @Route("/auth/login_check", methods={"GET"})
     */
    public function __invoke(): Response
    {
        return new Response("xxx");
    }
}
