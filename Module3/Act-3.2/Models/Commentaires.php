<?php

Class Commentaires{
    private $commenataires;
    private $db;

    public function __construct(){
        $this->db = $this->getDb();
    }


    public function getCommentsById($id){
        $commentsStatement = $this->db->prepare('SELECT * FROM commentaires WHERE article_id = :id');
        $commentsStatement->execute([
            'id'=>$id
        ]);
        $comments = $commentsStatement->fetchAll();

        return $comments;
    }

    public function addComment($text,$auteur,$date_publication,$article_id){
        $sqlQuery = 'INSERT INTO commentaires(texte, auteur, date_publication, article_id) VALUES (:texte, :auteur, :date_publication, :article_id)';
        $addComment = $this->db->prepare($sqlQuery);
        $addComment->execute([
            'texte' => $text,
            'auteur' => $auteur,
            'date_publication' => $date_publication, 
            'article_id' => $article_id, 
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
}