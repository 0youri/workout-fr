<?php

// connexion à la BD, retourne un lien de connexion
function getConnexionBD() {
	$conn_string = "host=ec2-54-228-9-90.eu-west-1.compute.amazonaws.com port=5432 dbname=df3npd7h1f5dkc
	user=eiqaobprkliovt password=6b4f68850425308602fcd0497e45515a6ff2c9abbbd0cc51d581ac1dfde4817d";
	$dbconn4 = pg_connect($conn_string);
	if (mysqli_connect_errno()) {
	    printf("Échec de la connexion : %s\n", mysqli_connect_error());
	    exit();
	}
	return $connexion;
}

// déconnexion de la BD
function deconnectBD($connexion) {
	mysqli_close($connexion);
}

?>
