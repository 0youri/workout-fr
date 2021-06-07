<div class="container" id="blockworkout">
    <?php
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
                                <button class="btn btn-dark bi bi-bar-chart-fill" type="button" id="statsw'.$explore[0].'" ></button>
                                <button class="btn btn-dark bi bi-gear-fill" type="button" id="modifw'.$explore[0].'" ></button>
                                <button class="btn btn-dark bi bi-plus-circle-fill" type="button" id="addw'.$explore[0].'" ></button>

                            </span>
                        </div>
                    </div>
                </div>
                <div id="collapsew'.$explore[0].'" style="display:none;">
                        <br>
                        <div class="card card-body">
                            <p><strong>Type:</strong> '.$explore[1].'</p>
                            <p><strong>Exercices:</strong>
                            <table class="table table-bordered">
                            <th>Muscles</th><th>Exercice</th><th>Nb séries</th><th>Nb répétitions</th><th>Poids (en kg)</th>
                            ';
            $info = file("model/w".$explore[0]."/info.txt");
            for ($j = 0; $j < count($info); $j++)
            {
                $exploreinfo = explode(":",$info[$j]);
                echo "<tr><td>".$exploreinfo[0]."</td><td>".$exploreinfo[1]."</td><td>".$exploreinfo[2]."</td>
                <td>".$exploreinfo[3]."</td><td>".$exploreinfo[4]."</td>";
            }
          
            echo '</table></p></div></div></div>';
        }
    ?>
    <br>
</div>