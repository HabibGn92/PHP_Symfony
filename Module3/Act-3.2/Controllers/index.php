<?php
include_once('../Models/Article.php');
include_once('../Models/Commentaires.php');
include_once('../utils.php');

$commentaires = new Commentaires();
$myArticles = new Article();
$listArticles = $myArticles->getArticles(3);
usort($listArticles, 'date_compare');
$listArticles = triArticles(3);


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $myArticles->deleteArticle($id);
    header("Location:index.php");
}

if ( isset($_POST['addArticle'])) {
    $myArticles->addArticle($_POST['titre'],$_POST['text'],$_POST['auteur'],$_POST['date']);
    header("Location:index.php");
}

if ( isset($_POST['addComment'])) {
    echo 'addComment';
    echo $_POST['comment'];
    $commentaires->addComment($_POST['comment'],$_POST['auteur'],$_POST['date'],$_POST['article_id']);
    header("Location:index.php");
}


if (isset($_GET['url'])) {
    if($_GET['url'] == 'posterArticle'){
        include_once('../Views/posterArticle.php');
    }
    elseif ($_GET['url'] == 'home') {
        include_once('../Views/article.php');
    }
}else{
        include_once('../Views/article.php');
}










