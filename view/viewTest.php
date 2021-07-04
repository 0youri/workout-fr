<?php
    $infoSQL = recoverTableDataDB("w1",$connect);
    $row = pg_fetch_all($infoSQL);
    echo '$row : '.$row[3]['id'];
?>