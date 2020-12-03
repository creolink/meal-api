<?php

namespace App\Security\Controller;

use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Tests\Functional\Utils\CallableEventSubscriber;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler as LexikAuthenticationSuccessHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Authenticate extends AbstractController
{
    /**
     * @Route("/apiss/login", methods={"POST"})
     */
    public function __invoke(Request $request): Response
    {
        $user = $this->getUser();


//        $this->forward('App\Controller\OtherController::fancy', [
//            'name'  => $name,
//            'color' => 'green',
//        ]);

        return new JsonResponse($user);
    }

//    public function __construct(
//        JWTTokenManagerInterface $jwtManager,
//        EventDispatcherInterface $dispatcher
//    ) {
//        parent::__construct($jwtManager, $dispatcher);
//    }
//
//    /**
//     * @Route("/api/login", methods={"POST"})
//     */
//    public function __invoke(Request $request, TokenInterface $token): Response
//    {
//        return new JsonResponse($this->onAuthenticationSuccess($request, $token));
//    }
}
