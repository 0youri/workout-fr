<?php

// connect to the DataBase
function connectDB()
{
	$connectStr = "host=".HOST." port=".PORT." dbname=".DBNAME." user=".USER." password=".PASSWORD."";
	$connect = pg_connect($connectStr);
	return $connect;
}

// deconnect from the DataBase
function deconnectBB($connexion)
{
	pg_close($connexion);
}

// search table data on DB
function recoverTableDataDB($nametable,$connect)
{
        $request = "SELECT * FROM public.".$nametable.";";
        if ( !pg_connection_busy($connect) ) pg_send_query($connect,$request);
        $tableSQL = pg_get_result($connect);
        if ( !$tableSQL ) printf("Error model/onload.php > pg_get_result(...)");
        return $tableSQL;
}

?>
