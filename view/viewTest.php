<?php
    $infoSQL = recoverTableDataDB("w1",$connect);
    $row = pg_fetch_assoc($infoSQL[3]);
    echo '$row : '.$row["id"];
?>