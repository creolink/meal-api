<?php

namespace App\BackOffice\Catalog\Application\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateMeal
{
    /**
     * @Route("/meal", methods={"POST"})
     */
    public function __invoke(): Response
    {
        return new Response("meal created");
    }
}
