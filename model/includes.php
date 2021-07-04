<?php

// connect to the DataBase
function connectDB()
{
	echo "here 1";
	$connectStr = "host=".$HOST." port=".$PORT." dbname=".$DBNAME." user=".$USER." password=".$PASSWORD."";
	echo "here 2";
	$connect = pg_connect($connectStr);
	echo "here 3";
	return $connect;
}

// deconnect from the DataBase
function deconnectBB($connexion)
{
	pg_close($connexion);
}

?>
