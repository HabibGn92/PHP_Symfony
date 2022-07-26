<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use FOS\RestBundle\Controller\Annotations as Rest;


class UserController extends AbstractController
{

    /**
     * @Rest\View(serializerGroups={"users"})
     * @Rest\Get("/articles", name="app_all",methods="GET")
     */
    public function getAll(ArticleRepository $articleRepo)
    {
       return $articleRepo->findAll();
    }

    
    /**
     * @Rest\View(serializerGroups={"users"})
     * @Rest\Get("/api/articles", name="app_users")
     */
    public function getUsers(ArticleRepository $articleRepo)
    {
        return $articleRepo->findAll();
     
    }

    /**
     * @Rest\View(serializerGroups={"users"})
     * @Rest\Get("/api/article/{id}", name="app_article_show")
     */
    public function show(ArticleRepository $articleRepo,$id)
    {
        $article = $articleRepo->find($id);
        if(!$article){
            return $this->json(["error message" => "article not found"],404);
        }
        return $articleRepo->find($id);
    }

    /**
     * @Rest\View(statusCode = 201, serializerGroups={"users"})
     * @Rest\Post("/api/article", name="app_add_article")
     */
    public function addArticle(EntityManagerInterface $em,Request $request,SerializerInterface $serializer)
    {
        try {
            $article = $serializer->deserialize($request->getContent(),Article::class,'json');
            $em->persist($article);
            $em->flush();
            return $article;
        } catch (NotEncodableValueException $e) {
            return $this->json(["error message"=>$e->getMessage()],400);
        }
    }

    /**
     * @Rest\Put("/api/article/{id?}", name="app_put")
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
     * @Rest\View(serializerGroups={"users"})
     * @Rest\Get("/api/last_articles",name="app_lastArticles")
     */
    public function getLastArticles(ArticleRepository $articleRepo)
    {
        return $articleRepo->findLast3Articles();
    }


    /**
     * @Rest\Delete("/api/article/{id}",name="app_deleteArticle",methods={"DELETE"})
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
}
