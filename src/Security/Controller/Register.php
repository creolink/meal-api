<?php

namespace App\Security\Controller;

use App\Meal\Domain\Model\Entity\MealUser;
use App\Security\Domain\Model\Entity\User;
use App\Security\Domain\Model\UserRoles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Register
{
    /**
     * @Route("/api/register", name="register", methods={"POST"})
     */
    public function __invoke(Request $request, UserPasswordEncoderInterface $encoder, EntityManagerInterface $em, ValidatorInterface $validator): Response
    {
        $password = $request->get('password');
        $email = $request->get('email');
        $country = $request->get('country');

        $user = new User();
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        $user->setCountry($country);
        $user->setRoles([
            UserRoles::ROLE_USER,
        ]);

        $errors = $validator->validate($user);
        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new JsonResponse($errorsString, Response::HTTP_BAD_REQUEST);
        }

        $em->persist($user);
        $em->flush();

        return new JsonResponse([
            'user' => $user->getEmail()
        ]);
    }
}
