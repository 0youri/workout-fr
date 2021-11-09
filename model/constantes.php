<?php
	define('HOST', parse_url($_ENV['DATABASE_URL'],PHP_URL_HOST) ); // Serveur
	define('PORT', parse_url($_ENV['DATABASE_URL'],PHP_URL_PORT) );
	define('DBNAME', substr(parse_url($_ENV['DATABASE_URL'],PHP_URL_PATH),1) ); // Nom de bdd
	define('USER', parse_url($_ENV['DATABASE_URL'],PHP_URL_USER) ); // Identifiant
	define('PASSWORD', parse_url($_ENV['DATABASE_URL'],PHP_URL_PASS)) ; // Mot de passe

?>
