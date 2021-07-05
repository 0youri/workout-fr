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
        else echo 'Error model/includes.php -> pg_connection_busy(...)';
        $tableSQL = pg_get_result($connect);
        if ( !$tableSQL ) echo "Error model/onload.php -> pg_get_result(...)";
        return $tableSQL;
}

function addTableDataDB($numberW,$muscle,$values,$connect)
{
        $id = "SELECT * FROM public.w1 WHERE muscle = 'Dos';";
        if ( !pg_connection_busy($connect) ) pg_send_query($connect,$id);
        else echo 'Error model/includes.php -> pg_connection_busy(...)';
        
        $id = pg_get_result($connect);
        if ( !$id ) echo 'Error model/includes.php -> pg_get_result(...)';
        $id = pg_fetch_assoc($id);
        $id = $id['id'];

        $request = "INSERT INTO public.stats".$numberW." (id, date, serie1,serie2,serie3,serie4,poids)
        VALUES (".$id.",".$values.");";
        if ( !pg_connection_busy($connect) ) pg_send_query($connect,$request);
        if ( !pg_get_result($connect) ) echo "Error model/includes.php -> pg_get_result(...)";
}

?>
