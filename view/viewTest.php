<?php
    $infoSQL = recoverTableDataDB("w1",$connect);
    //$row = pg_fetch_assoc();
    echo '$row : '.$infoSQL[3];
?>