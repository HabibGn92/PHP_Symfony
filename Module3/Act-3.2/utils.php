<?php include('connectDB.php') ?>
<?php
$articlesStatement = $db->prepare('SELECT * FROM articles');
$articlesStatement->execute();
$articles = $articlesStatement->fetchAll();

// tri des articles
function date_compare($element1, $element2) {
$datetime1 = strtotime($element1['date_publication']);
$datetime2 = strtotime($element2['date_publication']);
return $datetime2 - $datetime1;
} 
usort($articles, 'date_compare');

// fonction getArticles
function getArticles($n=null){
    global $articles;

    foreach($articles as $article){
        if(strtotime($article['date_publication']) < time()){
            $tab[] = $article;
        }
    }

    if($n === null || $n >= count($tab) || $n <= 0){
           return $tab;
    }

    if($n < count($tab)){
          for ($i=0; $i < $n ; $i++) { 
              $t[] = $tab[$i];
          }
          return $t;
      }  
    }

function getComments($id){
    global $db;
    $commentsStatement = $db->prepare('SELECT * FROM commentaires WHERE article_id = :id');
    $commentsStatement->execute([
        'id'=>$id
    ]);
    $comments = $commentsStatement->fetchAll();

    return $comments;
}




?>