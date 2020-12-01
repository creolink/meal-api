<?php

namespace App\Security\Controller;

use App\Security\Domain\Model\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Register
{
    /**
     * @Route("/api/register", name="register", methods={"POST"})
     */
    public function __invoke(Request $request, UserPasswordEncoderInterface $encoder, EntityManagerInterface $em): Response
    {
        $password = $request->get('password');
        $email = $request->get('email');

        $user = new User();
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email);

        $em->persist($user);
        $em->flush();

        return new JsonResponse([
            'user' => $user->getEmail()
        ]);
    }
}
