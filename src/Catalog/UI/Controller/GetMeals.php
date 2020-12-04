<?php

namespace App\Catalog\Meals\UI\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetMeals
{
    /**
     * @Route("/meal", methods={"GET"})
     */
    public function __invoke(): Response
    {
        return new Response("meals");
    }
}
