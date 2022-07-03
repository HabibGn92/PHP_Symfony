<?php

namespace App\Controller;

use App\Repository\MessageRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    /**
     * @Route("/message/{id}", name="app_message")
     */
    public function index(MessageRepository $messageRepository, UserRepository $userRepository, $id): Response
    {
        $user = $userRepository->find($id);
        $messages = $user->getMessage();
        return $this->render('message/index.html.twig', [
            'user' => $user,
            'messages' => $messages
        ]);
    }
}
