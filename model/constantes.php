<?php
	define('HOST', 'ec2-54-228-9-90.eu-west-1.compute.amazonaws.com'); // Serveur
	define('PORT', '5432');
	define('DBNAME', 'df3npd7h1f5dkc'); // Nom de bdd
	define('USER', 'eiqaobprkliovt'); // Identifiant
	define('PASSWORD', '6b4f68850425308602fcd0497e45515a6ff2c9abbbd0cc51d581ac1dfde4817d'); // Mot de passe
?>

<?php
/*
	define('HOST', parse_url($_ENV['DATABASE_URL'],PHP_URL_HOST) ); // Serveur
	define('PORT', parse_url($_ENV['DATABASE_URL'],PHP_URL_PORT) );
	define('DBNAME', parse_url($_ENV['DATABASE_URL'],PHP_URL_PATH) ); // Nom de bdd
	define('USER', parse_url($_ENV['DATABASE_URL'],PHP_URL_USER) ); // Identifiant
	define('PASSWORD', parse_url($_ENV['DATABASE_URL'],PHP_URL_PASS)) ; // Mot de passe
*/
echo parse_url($_ENV['DATABASE_URL'],PHP_URL_HOST);
	?>
