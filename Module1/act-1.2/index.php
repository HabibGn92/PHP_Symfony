<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php include('header.php') ?>
    <?php include('utils.php') ?>
    
    <?php $art = getArticles(3);?>

    <main class=" container content">
        
        <?php foreach($art as $article):?>
            <div class="card" style="width: 90%;margin: 15px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $article['titre']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $article['auteur']; ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $article['date']; ?></h6>
                    <p class="card-text"><?php echo $article['text']; ?></p>
                </div>
            </div>
        <?php endforeach ?>
        
       
    </main>
    <?php include('footer.php') ?>
</body>
</html>