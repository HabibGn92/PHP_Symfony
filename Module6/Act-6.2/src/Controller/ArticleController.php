<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="app_article", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepo): Response
    {
        $articles = $articleRepo->findAll();
        $response = $this->json($articles,200);
        return $response;
    }

    /**
     * @Route("/article/{id}", name="app_article_show", methods={"GET"})
     */
    public function show(ArticleRepository $articleRepo,$id):Response
    {
        $article = $articleRepo->find($id);
        if(!$article){
            return $this->json(["error message" => "article not found"],404);
        }
        $response = $this->json($article,200);
        return $response;
    }

    /**
     * @Route("/article", name="app_add_article", methods={"POST"})
     */
    public function addArticle(EntityManagerInterface $em,Request $request,SerializerInterface $serializer):Response
    {
        $article = $serializer->deserialize($request->getContent(),Article::class,'json');
        $em->persist($article);
        $em->flush();
        return $this->json($article,200);
    }

    
    /**
     * @GET("/articles", name="app_getArticles")
     */
    public function getArticles(ArticleRepository $articleRepo):Response
    {
        $articles = $articleRepo->findAll();
        $response = $this->json($articles,200);
        return $response;
    }

    /**
     * @GET("/articles/{id}", name="app_showArticle")
     */
    public function showArticle(ArticleRepository $articleRepo,$id):Response
    {
        $article = $articleRepo->find($id);
        if(!$article){
            return $this->json(["error message" => "article not found"],404);
        }
        $response = $this->json($article,200);
        return $response;
    }
}
