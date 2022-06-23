<?php 

// tri des articles
function date_compare($element1, $element2) {
$datetime1 = strtotime($element1['date_publication']);
$datetime2 = strtotime($element2['date_publication']);
return $datetime2 - $datetime1;
} 

// fonction getArticles
function triArticles($n=null){
    global $listArticles;

    foreach($listArticles as $article){
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


?>