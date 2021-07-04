<?php
    echo '<br> $request';
    $request = "SELECT id FROM public.w1 WHERE muscle = 'Jambes';"
    echo '<br> if';
    if ( !pg_connection_busy($connect) ) pg_send_query($connect,$request);
    echo '<br> $tableSQL';
    /*
    $tableSQL = pg_get_result($connect);
    $row = pg_fetch_assoc($tableSQL);
    echo '$row["id"] : '.$row['id'];
    echo "here after all";
    */
?>