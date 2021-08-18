<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['input-request-sql']) )
    {
        $request = $_POST['input-request-sql'];
        requestDB($request,$connect);
    }
?>