<?php

namespace App\BackOffice\Catalog\UI\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateMeal
{
    /**
     * @Route("/meal/{uuid}", methods={"PUT"})
     */
    public function __invoke(): Response
    {
        return new Response("meal updated");
    }
}
