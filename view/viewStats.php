<br>
<div class="container">
    <?php
        $nbW = $_GET['w'];
        $info = file("model/w".$nbW."/info.txt");
        for ( $i = 0; $i < count($info); $i++ )
        {
            $exploreinfo = explode(":",$info[$i]);
            $muscle = $exploreinfo[0];
            $exercice = $exploreinfo[1];
            $nbseries = $exploreinfo[2];
            $nbrep = $exploreinfo[3];
            $poids = $exploreinfo[4];

            $stats = file("model/w".$nbW."/stats/".strtolower($muscle).".txt");
            echo '<div class="badge bg-dark text-wrap">'.$muscle.' - '.$exercice.' - '.$nbseries.'x'.$nbrep.'</div>
            <div class="table-responsive">    
            <table class="table table-bordered">
                <th>Date</th><th>Nb reps</th><th>Poids</th><th>Niveau</th>';
            for ( $j = 0; $j < count($stats); $j++ )
            {
                $explorestats = explode(":",$stats[$j]);
                $date = $explorestats[0];
                $statspoids = $explorestats[1];
                $statsnbrep = $explorestats[2] + $explorestats[3] + $explorestats[4] + $explorestats[5];
                $statsnbreptext = $explorestats[2].":".$explorestats[3].":".$explorestats[4].":".$explorestats[5];
                if ( $statsnbrep < 24)
                    $mark = '<i class="bi text-danger bi-exclamation-triangle-fill"></i>';
                else if ( $statsnbrep >= 24 && $statsnbrep < 32)
                    $mark = '<i class="bi text-warning bi-exclamation-triangle-fill"></i>';
                else if ( $statsnbrep > 32 && $statsnbrep <= 39)
                    $mark = '<i class="bi text-primary bi-bar-chart-fill"></i>';
                else $mark = '<i class="bi text-success bi-check-circle-fill"></i>';
                echo '<tr>
                <td>'.$date.'</td>
                <td>'.$statsnbrep.'<br>('.$statsnbreptext.')</td>
                <td>'.$statspoids.'kg</td>
                <td>'.$mark.'</td>
                </tr>';
            }
            echo '</table></div>';
        }
        


    ?>
</div>
