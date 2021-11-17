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
        //$results = array();
        $result = pg_get_result($connect);
        while ( pg_get_result($connect) ) // $result = pg_get_result($connect);
        {
                //array_push($results, $result);
        }
        if ( !$result ) echo "<br>Error model/includes.php -> pg_get_result(...)";
        return $result;
}

?>
