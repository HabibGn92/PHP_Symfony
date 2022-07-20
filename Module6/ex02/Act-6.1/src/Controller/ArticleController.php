<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ArticleController extends AbstractController
{
    

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    
    /**
     * @Route("/articles", name="app_articles")
     */
    public function getArticles():Response
    {
        $response = $this->client->request('GET','https://jsonplaceholder.typicode.com/posts');
        $response2 = $this->client->request('GET','https://jsonplaceholder.typicode.com/comments');
        $content = $response->toArray();
        $content2 = $response2->toArray();
        return $this->render('article/index.html.twig',[
            'articles' => $content,
            'comments' => $content2
        ]);
    }

    /**
     * @Route("/articles/addArticle", name="app_articles_add")
     */
    public function addArticle():Response
    {
        // if(isset($_POST['submit'])){
        //     $this->client->request('POST','https://jsonplaceholder.typicode.com/posts',
        //     'body' => [] )
        // }
        return $this->render('article/addArticle.html.twig',[]);
    }

}
