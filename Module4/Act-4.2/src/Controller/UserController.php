<?php

namespace App\Controller;


use App\Entity\User;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/create", name="app_user")
     */
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setFirstName("Habib");
        $user->setLastName("Hajjem");
        $user->setEmail("habib.hajjem@talan.com");
        $user->setAddress("rafraf");
        $user->setBirthDate(new DateTime());

        $entityManager->persist($user);
        $entityManager->flush();
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/getAll", name="app_get")
     */
    public function getAll(): Response
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }
    /**
     * @Route("/get_user/{id}", name="app_get")
     */
    public function getUserById(int $id, UserRepository $userRepository): Response
    {
        $user = $userRepository->findById($id);
        return $this->render('user/index.html.twig', [
            'users' => $user,
        ]);
    }
}
