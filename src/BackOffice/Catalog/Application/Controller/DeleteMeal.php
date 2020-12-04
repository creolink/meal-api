<?php

namespace App\BackOffice\Catalog\Application\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteMeal
{
    /**
     * @Route("/meal/{uuid}", methods={"DELETE"})
     */
    public function __invoke(): Response
    {
        return new Response("meal deleted");
    }
}
