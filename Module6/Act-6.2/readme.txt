
 - composer install	

 - php bin/console doctrine:database:create

 - php bin/console d:m:m

 - php bin/console d:f:l

 - php bin/console server:run

 * Sur Postman :
 
 - Pour récupérer tous les articles utiliser l'url suivante via GET : http://127.0.0.1:8000/articles

 - Pour récupérer un article utiliser l'url suivante via GET : http://127.0.0.1:8000/article/{id}

 - Pour insérer un article conforme à celui passé via le body de la requete utiliser l'url suivante via POST : http://127.0.0.1:8000/article

 - Pour insérer ou modifier un article conforme à celui passé via le body de la requete utiliser l'url suivante via PUT : http://127.0.0.1:8000/article/{id} (id mentionné en cas de modification)

 - Pour récupérer les 3 derniers articles utiliser l'url suivante via GET: http://127.0.0.1:8000/last_articles

 - Pour supprimer un article utiliser l'url suivante via DELETE : http://127.0.0.1:8000/article/{id}