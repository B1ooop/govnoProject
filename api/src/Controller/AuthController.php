<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\SerializerInterface;

class AuthController extends AbstractController
{
    public function __construct(
        private UserRepository $userRepository,
        private SerializerInterface $serializer
    )
    {

    }

    #[Route('/register', name: 'user.register')]
    public function app(Request $request) : JsonResponse
    {
        $jsonData = json_decode($request->getContent());
        if ($this->userRepository->findOneByEmail($jsonData->email)) {
            return new JsonResponse(['status' => 'already exists'], Response::HTTP_CONFLICT); //409
        }
        $this->userRepository->create($jsonData);

        return new JsonResponse(['status' => 'ok'], Response::HTTP_CREATED); //201
    }
}
