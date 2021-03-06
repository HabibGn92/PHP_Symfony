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
     * @Route("/", name="app_articles")
     */
    public function getArticles():Response
    {
        $response = $this->client->request('GET','http://127.0.0.1:8000/articles');
        $response2 = $this->client->request('GET','https://jsonplaceholder.typicode.com/comments');
        $content = $response->toArray();
        $content2 = $response2->toArray();
        return $this->render('article/index.html.twig',[
            'articles' => $content,
            // 'comments' => $content2
        ]);
    }

    /**
     * @Route("/deleteArticle", name="app_deleteArticle")
     */
    public function deleteArticle():Response
    {
        if (isset($_GET['id'])) {
            $this->client->request('DELETE','http://127.0.0.1:8000/article/'.$_GET['id']);
            return $this->redirectToRoute('app_articles');
        }
    }

    /**
     * @Route("/articles/addArticle", name="app_articles_add")
     */
    public function addArticle():Response
    {
        if(isset($_POST['submit'])){
            $this->client->request('POST','http://127.0.0.1:8000/article',[
                'json' => ['title' => $_POST['title'],
                            'content' => $_POST['content'],
                            'author' => $_POST['author'],
                            'createdAt' =>  '2021-04-17 17:29:15'
                ]
            ]
             );
        }
        return $this->render('article/addArticle.html.twig',[]);
    }



}
