<?php

namespace App\Security\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteUser
{
    /**
     * @Route("/user/{uuid}", methods={"DELETE"})
     */
    public function __invoke(): Response
    {
        return new Response("user deleted");
    }
}
