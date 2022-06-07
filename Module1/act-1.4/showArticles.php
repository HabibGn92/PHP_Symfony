<?php foreach($listArticles as $article):?>
            <div class="card" style="width: 90%;margin: 15px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $article['titre']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $article['auteur']; ?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $article['date_publication']; ?></h6>
                    <p class="card-text"><?php echo $article['texte']; ?></p>
                </div>
                <div style="margin-left:20px;margin-bottom:10px;">
                    <a  class="btn btn-danger" href="delete_post.php?id=<?php echo $article['id']?>">Supprimer l'article</a>
                </div>
                <hr style="width:85%;margin:auto;margin-bottom:10px">
                
                
                <?php
                $commentsStatement = $db->prepare('SELECT * FROM commentaires WHERE article_id = :id');
                $commentsStatement->execute([
                    'id'=>$article['id']
                ]);
                $comments = $commentsStatement->fetchAll();
                 ?>
                
                <?php if($comments):?>
                <h4 style="margin-left:15px">Commentaires:</h4>
                <?php foreach($comments as $comment):?>
                    <div style="margin-left:35px;background-color:rgb(233, 231, 231);margin-bottom:10px;padding:10px;border-radius:5px 5px;width:70%;">
                    <p><?php echo $comment['texte'] ?></p>
                    <p>Publié par : <strong> <?php echo $comment['auteur'] ?></strong>, le <strong><?php echo $comment['date_publication'] ?></strong></p>
                    </div>
                <?php endforeach ?> 
                
                <hr style="width:85%;margin:auto;margin-bottom:10px">
                <?php endif ?>
                <form action="addComment.php" method="post" style="margin-bottom:10px;margin-left:20px;">
                <input type="hidden" name="article_id" value="<?php echo $article['id']?>">
                <input type="hidden" name="date" value="<?php echo date('Y-m-d')?>">
                    <div class="mb-3 d-flex">
                        <input type="text" name="comment" style="width:50%;" class="form-control" id="exampleFormControlInput1" placeholder="Taper un commentaire">
                    </div>
                    <div class="mb-3 d-flex">
                        <input type="text" name="auteur" style="width:50%;" class="form-control" id="exampleFormControlInput1" placeholder="Auteur du commentaire">
                    </div>
                    <button type="submit" name="addComment" class="btn btn-secondary">Ajouter commentaire</button>
                </form> 
            </div>

<?php endforeach ?> 
        
