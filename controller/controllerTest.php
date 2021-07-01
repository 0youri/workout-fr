<br>
<div class="container">
<?php
$connStr = "host=ec2-54-228-9-90.eu-west-1.compute.amazonaws.com port=5432 dbname=df3npd7h1f5dkc user=eiqaobprkliovt password=6b4f68850425308602fcd0497e45515a6ff2c9abbbd0cc51d581ac1dfde4817d";
$conn = pg_connect($connStr);
$requete = "CREATE TABLE test2 (vector  int[][]);";
$result = pg_query($conn, $requete);
var_dump(pg_fetch_all($result));
?>
</div>