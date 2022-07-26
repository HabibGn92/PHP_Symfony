<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{

    /**
     * @Route("/articles", name="app_all")
     */
    public function getALl(ArticleRepository $articleRepo)
    {
        $articles = $articleRepo->findAll();
        return $this->json($articles,200);
    }

    /**
     * @Route("/api/articles", name="app_users")
     */
    public function getUsers(ArticleRepository $articleRepo)
    {
        $articles = $articleRepo->findAll();
        return $this->json($articles,200);
    }
}
