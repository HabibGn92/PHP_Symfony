<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php include('../header.php') ?>
    <main class=" container content">
    <?php foreach($listArticles as $article):?>
            <div class="card" style="width: 90%;margin: 15px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $article['titre']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $article['auteur']; ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $article['date_publication']; ?></h6>
                    <p class="card-text"><?php echo $article['texte']; ?></p>
                </div>
                <div style="margin-left:20px;margin-bottom:10px;">
                    <a  class="btn btn-danger" href="index.php?id=<?php echo $article['id']?>">Supprimer l'article</a>
                </div>
                <hr style="width:85%;margin:auto;margin-bottom:10px">
            </div>
    <?php endforeach ?>         
    </main> 
    <?php include('../footer.php')?>
</body>
</html>