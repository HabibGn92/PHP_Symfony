<?php foreach($listArticles as $article):?>
            <div class="card" style="width: 90%;margin: 15px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $article['titre']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $article['auteur']; ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $article['date_publication']; ?></h6>
                    <p class="card-text"><?php echo $article['texte']; ?></p>
                </div>
                <a  class="btn btn-primary" href="delete_post.php?id=<?php echo $article['id']?>">Supprimer</a>
            </div>
<?php endforeach ?> 
        
