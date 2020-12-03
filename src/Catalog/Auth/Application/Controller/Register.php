<?php

namespace App\BackOffice\Controller;

use App\BackOffice\Application\Register\UserCreator;
use App\BackOffice\Domain\Dto\NewUser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Register
{
    /**
     * @Route("/auth/register", name="register", methods={"POST"})
     * @ParamConverter("userDto")
     */
    public function __invoke(UserDto $userDto, UserCreator $creator): Response
    {
        //$userChecker->check();

        $user = $creator->register($userDto);

        return new JsonResponse([
            'user' => $user->getEmail()
        ]);
    }
}
