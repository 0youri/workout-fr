<?php
    $workoutHTML = "";
    $allworkoutSQL = recoverTableDataDB("allworkout",$connect);
    while ( $dataAllWorkout = pg_fetch_assoc($allworkoutSQL) )
    {
        
        $workoutHTML = $workoutHTML.'<div id="w'.$dataAllWorkout['id'].'">
            <br>
            <div class="card-body border rounded ">
                <div class="position-relative">
                    <div class="text-black fs-5">
                        <strong>#'.$dataAllWorkout['id'].' - '.$dataAllWorkout['type'].'</strong>
                        <span class="position-absolute end-0">
                            <button class="btn btn-dark bi bi-info-circle-fill" type="button" id="infow'.$dataAllWorkout['id'].'" 
                            onclick="AfficherCollapse(`collapsew'.$dataAllWorkout['id'].'`);"></button>
                            <a class="btn btn-dark bi bi-bar-chart-fill" id="statsw'.$dataAllWorkout['id'].'" 
                            href="index.php?page=stats&w='.$dataAllWorkout['id'].'"></a>
                            <button class="btn btn-dark bi bi-gear-fill" type="button" id="modifw'.$dataAllWorkout['id'].'" ></button>
                            <a class="btn btn-dark bi bi-plus-circle-fill" id="addw'.$dataAllWorkout['id'].'" 
                            href="index.php?page=add&w='.$dataAllWorkout['id'].'&etat=-1"></a>

                        </span>
                    </div>
                </div>
            </div>
            <div id="collapsew'.$dataAllWorkout['id'].'" style="display:none;">
                    <br>
                    <div class="card card-body">
                        <p><strong>Type:</strong> '.$dataAllWorkout['type'].'</p>
                        <p><strong>Exercices:</strong>
                        <div class="table-responsive">
                        <table class="table table-bordered">
                        <th>Muscle</th><th>Exercice</th><th>Nb séries x Nb reps</th><th>Poids</th>
        ';
        $infoSQL = recoverTableDataDB("w".$dataAllWorkout['id'],$connect);
        while ( $dataInfo = pg_fetch_assoc($infoSQL) )
        {
            $workoutHTML = $workoutHTML."<tr><td>".$dataInfo['muscle']."</td><td>".$dataInfo['exercice']."</td>
            <td>".$dataInfo['series']."x".$dataInfo['repetitions']."</td><td>".$dataInfo['poids']."kg</td>";
        }
    
        $workoutHTML = $workoutHTML.'</table></div></p></div></div></div>';
    }

?>