<?php
$articles[] = array(
        'titre' => 'php',
        'text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
        'auteur' => 'Habib Hajjem',
        'date' =>'12-12-2020');

$articles[] = array(
        'titre' => 'Symfony',
        'text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
        'auteur' => 'Med Ali',
        'date' =>'06-06-2021'
);

$articles[] = array(
        'titre' => 'Angular',
        'text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
        'auteur' => 'Ala',
        'date' => '02-06-2022'
);

$articles[] = array(
        'titre' => 'HTML',
        'text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
        'auteur' => 'Bilel',
        'date' => '02-01-2017'
);

$articles[] = array(
        'titre' => 'React JS',
        'text' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
        'auteur' => 'Ala',
        'date' => '02-10-2019'
);

function date_compare($element1, $element2) {
    $datetime1 = strtotime($element1['date']);
    $datetime2 = strtotime($element2['date']);
    return $datetime2 - $datetime1;
} 
usort($articles, 'date_compare');

function getArticles($n=null){

    global $articles;

    foreach($articles as $article){
        if(strtotime($article['date']) < time()){
            $tab[] = $article;
        }
    }

    if($n === null || $n >= count($tab)){
           $t = $tab;
    }

    if($n < count($tab)){
          for ($i=0; $i < $n ; $i++) { 
              $t[] = $tab[$i];
          }
      }  

      return $t;
      
    }

    
    
    

   


?>