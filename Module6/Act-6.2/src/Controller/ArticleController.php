<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="app_article", methods={"GET"})
     */
    public function getArticles(ArticleRepository $articleRepo): Response
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
        try {
            $article = $serializer->deserialize($request->getContent(),Article::class,'json');
            $em->persist($article);
            $em->flush();
            return $this->json($article,201);
        } catch (NotEncodableValueException $e) {
            return $this->json(["error message"=>$e->getMessage()],400);
        }
    }

    /**
     * @Route("/article/{id?}", name="app_put", methods={"PUT"})
     */
    public function editArticle(Request $request,SerializerInterface $serializer,$id=null,EntityManagerInterface $em,ArticleRepository $articleRepo):Response
    {
        $content = $serializer->deserialize($request->getContent(),Article::class,'json');

        if($id){
            $article = $articleRepo->find($id);
            if(!$article){
                return $this->json(["error message" => "article not found"],404);
            }
            $article->setTitle($content->getTitle());
            $article->setAuthor($content->getAuthor());
            $article->setContent($content->getContent());
            $article->setCreatedAt($content->getCreatedAt());
            $em->flush();
            return $this->json($article,200);
        }

        
        $em->persist($content);
        $em->flush();
        return $this->json($content,201);
    }

    /**
     * @Route("/last_articles",name="app_lastArticles", methods={"GET"})
     */
    public function getLastArticles(ArticleRepository $articleRepo):Response
    {
        $articles = $articleRepo->findLast3Articles();
        return $this->json($articles,200);
    }

    /**
     * @Route("/article/{id}",name="app_deleteArticle",methods={"DELETE"})
     */
    public function deleteArticle(ArticleRepository $articleRepo,EntityManagerInterface $em,$id):Response
    {
        $article = $articleRepo->find($id);
        if(!$article){
            return $this->json(["error message" => "article not found"],404);
        }
        $em->remove($article);
        $em->flush();
        return $this->json(["message" => "article deleted successfully"]);
    }


    // /**
    //  * @GET("/articles", name="app_getArticles")
    //  */
    // public function getArticles(ArticleRepository $articleRepo):Response
    // {
    //     $articles = $articleRepo->findAll();
    //     $response = $this->json($articles,200);
    //     return $response;
    // }

    // /**
    //  * @GET("/article/{id}", name="app_showArticle")
    //  */
    // public function showArticle(ArticleRepository $articleRepo,$id):Response
    // {
    //     $article = $articleRepo->find($id);
    //     if(!$article){
    //         return $this->json(["error message" => "article not found"],404);
    //     }
    //     $response = $this->json($article,200);
    //     return $response;
    // }
}
