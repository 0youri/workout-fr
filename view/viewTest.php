<?php

    $connect = connectDB();
    $request = "SELECT id FROM public.w1 WHERE muscle = 'Jambes';"
    if ( !pg_connection_busy($connect) ) pg_send_query($connect,$request);
    $tableSQL = pg_get_result($connect);
    echo '$tableSQL : '.$tableSQL;
    $row = pg_fetch_assoc($tableSQL);
    echo '$row["id"] : '.$row['id'];

?>