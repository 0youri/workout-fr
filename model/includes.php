<?php

// connect to the DataBase
function connectDB()
{
	$connectStr = "host=".$HOST." port=".$PORT." dbname=".$DBNAME." user=".$USER." 
	password=".$PASSWORD."";
	$connect = pg_connect($connectStr);
	if ( pg_last_error() ) {
	    printf("Échec de la connexion : %s\n", pg_last_error());
	    exit();
	}
	return $connect;
}

// deconnect from the DataBase
function deconnectBB($connexion)
{
	pg_close($connexion);
}

?>
