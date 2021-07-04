<?php
    $connect = connectDB();

    function recoverTableDataDB($nametable)
    {
        $request = "SELECT * FROM public.".$nametable.";";
        if ( !pg_connection_busy($connect) ) pg_send_query($connect,$request);
        $tableSQL = pg_get_result($connect);
        if ( !$tableSQL ) printf("Error model/onload.php > pg_get_result(...)");
        return $tableSQL;
    }
    


?>