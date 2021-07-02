<?php
    $connect = connectDB();
    $request = "SELECT * FROM public.allworkout";
    $allData = pg_query($connect,$request);
    if ( !$allData ) printf("Error model/onload.php > pg_query(...)");
    /*
    $data = pg_fetch_assoc($allData);
    if ( !$data ) printf("Error model/onload.php > pg_fetch_assoc(...)");
    */
?>