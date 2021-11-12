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
function requestDB($request,$connect)
{
        if ( !pg_connection_busy($connect) ) pg_send_query($connect,$request);
        else echo '<br>Error model/includes.php -> pg_connection_busy(...)';
        while ( $result = pg_get_result($connect) ) { continue }
        if ( !$result ) echo "<br>Error model/includes.php -> pg_get_result(...)";
        return $result;
}

function addTableDataDB($id,$values,$connect)
{
        $request = "INSERT INTO public.stats (id,date,serie1,serie2,serie3,serie4,weight,muscle,rank)
        VALUES (".$id.",".$values.");";
        if ( !pg_connection_busy($connect) ) pg_send_query($connect,$request);
        if ( !pg_get_result($connect) ) echo "<br>Error model/includes.php -> pg_get_result(...)";
}

?>
