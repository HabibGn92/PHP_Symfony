
 * composer install

 * php bin/console doctrine:database:create

 * php bin/console doctrine:migrations:migrate

 * php bin/console doctrine:fixtures:load

 * php bin/console server:run

 * générer les clés SSH :
	
	mkdir -p config/jwt

	openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096

	openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem

 * sur Postman :

	- pour générer le token : envoyer une requete POST à /api/login_check avec le données suivant :

	body : { "username":"admin@talan.com","password":"admin123"}

	header : Content-Type : application/json

	- pour récupérer tous les articles (route sécurisée) : envoyer une requete GET à /api/users avec les données suivantes:

	header : Authorization : token généré précédemment 
	
		 Content-Type : application/json

	- pour récupérer tous les articles (route non sécurisée) : envoyer une requete GET /users avec les données suivantes:

	header : Content-Type : application/json