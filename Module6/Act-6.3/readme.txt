
 * composer install

 * php bin/console doctrine:database:create

 * php bin/console doctrine:migrations:migrate

 * php bin/console doctrine:fixtures:load

 * php bin/console server:run

 * dans le fichier .env : modifier le mot de pass(JWT_PASSPHRASE)

 * générer les clés SSH :
	
	mkdir -p config/jwt

	openssl genrsa -out config/jwt/private.pem -aes256 4096

	openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem

 * sur Postman : 

	- ajouter dans header : Content-Type : application/json

	- pour générer le token : envoyer une requete POST à /api/login_check avec le données suivant :

		body : { "username":"admin@talan.com","password":"admin123"}
	
	- pour récupérer tous les articles (route non sécurisée) : envoyer une requete GET /articles

	* Pour les routes sécurisés ajouter dans header la ligne suivante :  Authorization : Bearer token


	- pour récupérer tous les articles : envoyer une requete GET à /api/articles

	- pour récupérer un article : envoyer une requete GET à /api/article/{id}

	- pour ajouter un article : envoyer une requete POST à /api/article avec un body qui contient l'article à ajouter

	- pour ajouter ou modifier un article : envoyer une requete PUT avec un body qui contient les modifs ou l'article à ajouter à /api/article/{id} 

	- pour récupérer les 3 derniers articles : envoyer une requete GET à /api/last_articles

	- pour supprimer un article : envoyer une requete DELETE à /api/article/{id}


