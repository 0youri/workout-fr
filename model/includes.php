<?php

// connect to the DataBase
function connectDB()
{
	$connectStr = "host=".HOST." port=".PORT." dbname=".DBNAME." user=".USER." password=".PASSWORD."";
	$connect = pg_connect($connectStr);
	echo "<br> connectBD : ".$connect;
	return $connect;
}

// deconnect from the DataBase
function deconnectBB($connexion)
{
	pg_close($connexion);
}

?>
