<?php

namespace App\BackOffice\Catalog\UI\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetMeal
{
    /**
     * @Route("/meal/{uuid}", methods={"GET"})
     */
    public function __invoke(): Response
    {
        return new Response("meal");
    }
}
