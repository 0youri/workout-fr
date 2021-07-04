<div class="container" id="blockworkout">
    <?php
        //$connectStr = "host=".$HOST." port=".$PORT." dbname=".$DBNAME." user=".$USER." password=".$PASSWORD."";
        //$connect = pg_connect($connectStr);
        //require('model/onload.php');
        echo "here 1<br>";
        $connect = connectDB();
        echo "here 2<br>";
        $request = "SELECT * FROM public.allworkout;";
        if ( !pg_connection_busy($connect) ) pg_send_query($connect,$request);
        $allData = pg_get_result($connect);
        while ( $row = pg_fetch_assoc($allData) )
        {
            echo "id: ".$row['id'];
            echo "<br>";
            echo "name: ".$row['name'];
            echo "<br>";
        }
        echo "hello";
    /*
        $allworkout = file("model/allworkout.txt");

        for ($i = 0; $i < count($allworkout); $i++)
        {
            $explore = explode(":",$allworkout[$i]);
            echo '<div id="w'.$explore[0].'">
                <br>
                <div class="card-body border rounded ">
                    <div class="position-relative">
                        <div class="text-black fs-5">
                            <strong>#'.$explore[0].' - '.$explore[1].'</strong>
                            <span class="position-absolute end-0">
                                <button class="btn btn-dark bi bi-info-circle-fill" type="button" id="infow'.$explore[0].'" 
                                onclick="AfficherCollapse(`collapsew'.$explore[0].'`);"></button>
                                <a class="btn btn-dark bi bi-bar-chart-fill" id="statsw'.$explore[0].'" 
                                href="index.php?page=stats&w='.$explore[0].'"></a>
                                <button class="btn btn-dark bi bi-gear-fill" type="button" id="modifw'.$explore[0].'" ></button>
                                <a class="btn btn-dark bi bi-plus-circle-fill" id="addw'.$explore[0].'" 
                                href="index.php?page=add&w='.$explore[0].'&etat=-1"></a>

                            </span>
                        </div>
                    </div>
                </div>
                <div id="collapsew'.$explore[0].'" style="display:none;">
                        <br>
                        <div class="card card-body">
                            <p><strong>Type:</strong> '.$explore[1].'</p>
                            <p><strong>Exercices:</strong>
                            <div class="table-responsive">
                            <table class="table table-bordered">
                            <th>Muscle</th><th>Exercice</th><th>Nb séries x Nb reps</th><th>Poids</th>
                            ';
            $info = file("model/w".$explore[0]."/info.txt");
            for ($j = 0; $j < count($info); $j++)
            {
                $exploreinfo = explode(":",$info[$j]);
                echo "<tr><td>".$exploreinfo[0]."</td><td>".$exploreinfo[1]."</td>
                <td>".$exploreinfo[2]."x".$exploreinfo[3]."</td><td>".$exploreinfo[4]."kg</td>";
            }
          
            echo '</table></div></p></div></div></div>';
        }
        */
    ?>
    <br>
</div>
