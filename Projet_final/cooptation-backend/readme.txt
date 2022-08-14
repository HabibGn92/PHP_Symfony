Module 8 : Projet De Fin De Formation

#Installation:

	Cloner le projet 
	Installer les dépendances : composer install
	Créer une base de données: php bin/console d:d:c
	Jouer les migrations : php bin/console make:migration puis php bin/console d:m:m
	Lancer le server : php bin/console server:run 

#Installation du bundle pour la gestion des JWT:

	Générer une clé publique et privée avec une passphrase à reporter dans le .env:
		$ mkdir -p config/jwt
		$ openssl genrsa -out config/jwt/private.pem -aes256 4096
		$ openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
	JWT_PASSPHRASE=samarapi
#Postman
	générer le token : envoyer une requete POST à /api/login_check avec le données suivant :

		body : { "username":"admin@talan.com","password":"admin123"}
		header : Content-Type : application/json

	Les différentes routes à exécuter via des verbes HTTP :
		@GET("api/users"):  pour récupérer tous les utlisateurs
		@GET("api/user/{id}):  pour récupérer le utlisateur {id}
		@POST("api/user/"):  pour  insèrer un nouvel utlisateur
		@Put("api/user/{id}):  pour modifier un utlisateur {id}
		@Delete("api/user/{id}):  pour supprimerr l'utlisateur {id}