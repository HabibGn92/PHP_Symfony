<?php
include_once('../Models/Article.php');

$myArticles = new Article();
$listArticles = $myArticles->getArticles();

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

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $myArticles->deleteArticle($id);
}

if ( isset($_POST['addArticle'])) {
    $myArticles->addArticle($_POST['titre'],$_POST['text'],$_POST['auteur'],$_POST['date']);
}







