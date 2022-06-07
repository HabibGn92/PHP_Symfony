<?php include('connectDB.php') ?>
<?php 
if ( isset($_POST['addComment'])) {
    
    $sqlQuery = 'INSERT INTO commentaires(texte, auteur, date_publication, article_id) VALUES (:texte, :auteur, :date_publication, :article_id)';
    
    $addComment = $db->prepare($sqlQuery);
    $addComment->execute([
        'texte' => $_POST['comment'],
        'auteur' => $_POST['auteur'],
        'date_publication' => $_POST['date'], 
        'article_id' => $_POST['article_id'], 
    ]);

    header('Location: '.$rootUrl.'index.php');
}
    ?>