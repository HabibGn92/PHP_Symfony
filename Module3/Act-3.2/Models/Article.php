<?php

class Article {
    private $article;
    private $db;
    private static $database;

    public function __construct(){

        $this->db = $this->getDb();
        $this->article = $this->getArticles();
    }

    public function getArticles(){
        $articlesStatement = $this->db->prepare('SELECT * FROM articles');
        $articlesStatement->execute();
        return $articles = $articlesStatement->fetchAll();
    }

    public function deleteArticle($id){
        $sqlQuery = 'DELETE FROM articles WHERE id=:id';
        $deleteArticle = $this->db->prepare($sqlQuery);
        $deleteArticle->execute([
           'id' => $id
        ]);
    }

    public function addArticle($titre,$text,$auteur,$date_publication){
        $sqlQuery = 'INSERT INTO articles(titre, texte, auteur, date_publication) VALUES (:titre, :texte, :auteur, :date_publication)';
        $insertArticle = $this->db->prepare($sqlQuery);
        $insertArticle->execute([
            'titre' => $titre,
            'texte' => $text,
            'auteur' => $auteur,
            'date_publication' => $date_publication, 
        ]);
    }
    
    public function getDb(){
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=database;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        { 
            die('Erreur : ' . $e->getMessage());
        }   
        return $db;
    }

    public static function connectDB(){
        if (is_null(self::$db)) {
            try
            {
                self::$db = new PDO('mysql:host=localhost;dbname=database;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            { 
                die('Erreur : ' . $e->getMessage());
            }
        }
        return self::$db;
    }
    
    




}